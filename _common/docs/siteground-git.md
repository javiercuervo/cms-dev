# Git en SiteGround: Guía práctica

## 1. Introducción

La herramienta de Git de SiteGround es una integración propia dentro de Site Tools que permite crear repositorios Git de tus sitios con una interfaz visual sencilla. Está pensada para desarrolladores que necesitan versionar código, trabajar en local y desplegar cambios de forma controlada.

En un proyecto WordPress alojado en SiteGround, Git se utiliza para versionar el código del sitio (normalmente el contenido de `wp-content`), desarrollar en local y luego desplegar los cambios al servidor de producción. Esto reduce riesgos frente a cambios directos vía FTP o desde el editor de WordPress.

Entre las principales ventajas de usar **Git** con SiteGround se encuentran:

- Control de versiones del código (historial de cambios, diffs, ramas).
- Posibilidad de revertir rápidamente a un estado anterior del sitio ante errores (rollback mediante checkout de commits o ramas).
- Facilitar el trabajo en equipo: cada desarrollador clona el repositorio, desarrolla en local y sube cambios coordinados.
- Integración con SSH para clonación y despliegue más seguros y rápidos que SFTP.

## 2. Requisitos previos

### 2.1 Planes de hosting compatibles

La herramienta de Git está disponible en Site Tools para planes avanzados (GoGeek y Cloud en la versión clásica del plugin SG-Git; en la interfaz Site Tools se expone bajo el panel Devs > Git). No todos los planes compartidos básicos tienen Git; conviene verificar en tu panel si aparece la opción "Git" dentro de "Devs".

Para proyectos WordPress en cloud hosting con Site Tools, Git suele estar disponible por defecto en la sección de herramientas de desarrollo del sitio. Si no ves el módulo, puede indicar que tu plan actual no lo incluye.

### 2.2 Acceso y permisos necesarios

Para usar Git en SiteGround necesitas:

- Acceso a **Site Tools** del sitio concreto (pestaña Websites > botón "Site Tools").
- Acceso **SSH** activado en tu cuenta, ya que Git usa el protocolo SSH para transferir datos entre servidor y equipo local.
- Una **clave SSH** generada en "SSH Keys Manager" y descargada/importada en tu máquina local.
- Permisos suficientes sobre el sitio (usuario con rol de propietario o colaborador con acceso a Devs > Git).

En Site Tools, la gestión de claves SSH se realiza desde:

`Site Tools > Devs > SSH Keys Manager`, donde puedes crear claves, ver la privada y copiarla para usarla localmente.

### 2.3 Conocimientos básicos de Git recomendados

Aunque la interfaz de SiteGround simplifica parte del flujo, se recomienda que el equipo domine conceptos básicos de Git:

- Repositorio, commit, branch, remote, push, pull.
- Comandos habituales: `git status`, `git add`, `git commit`, `git push`, `git pull`, `git checkout`.
- Resolución de conflictos de fusión (merge conflicts) y uso mínimo de ramas para features.

## 3. Activar y configurar Git en SiteGround

### 3.1 Localizar la herramienta de Git en Site Tools

Para acceder a Git en SiteGround:

1. Inicia sesión en tu cuenta de SiteGround.
2. Ve a la pestaña **Websites** y localiza el sitio WordPress correspondiente.
3. Haz clic en **Site Tools** para ese sitio.
4. En el menú lateral, ve a **Devs > Git**.

En esta pantalla verás los repositorios existentes asociados a ese sitio y opciones para crear nuevos repositorios según la estructura de la aplicación (WordPress, Joomla, etc.).

### 3.2 Crear un repositorio Git para un sitio WordPress

El flujo típico para crear un repo Git de un WordPress en SiteGround es:

1. En `Site Tools > Devs > Git`, haz clic en el botón para **crear nuevo repositorio** (New Repository o similar).
2. Selecciona el sitio o directorio raíz que quieres versionar (normalmente la raíz del WordPress).
3. Asigna un nombre al repositorio; SiteGround creará la estructura y lo asociará al directorio de tu aplicación.
4. Una vez creado, en la tabla de repositorios verás opciones como: ver la URL de clonación, gestionar el repositorio o borrarlo.

En versiones antiguas (plugin SG-Git) la creación se hacía desde un módulo "SG-Git" listando dominios no versionados, pero en Site Tools el flujo se unifica en Devs > Git.

### 3.3 Qué parte del sitio se incluye en el repositorio

Por defecto, SiteGround versiona el directorio `wp-content`, que incluye:

- Temas (`wp-content/themes`)
- Plugins (`wp-content/plugins`)
- Subidas de medios (`wp-content/uploads`)

Muchos equipos prefieren **excluir** los medios (`uploads`) y a veces algunos plugins pesados o generados, para evitar repositorios enormes y datos que no son realmente "código". En esos casos se configura un `.gitignore` antes de crear el repositorio o inmediatamente después, para que no se añadan esos contenidos.

Una práctica habitual es:

- Incluir temas y plugins personalizados.
- Excluir plugins de terceros instalables desde el repositorio oficial.
- Excluir `uploads` y otros directorios generados (cachés, backups, etc.).

### 3.4 Notas sobre `.gitignore` y buenas prácticas

Antes de hacer el primer commit completo del código, define un archivo `.gitignore` en la raíz de la parte versionada (por ejemplo, dentro de `wp-content` si el repo apunta ahí). Algunas recomendaciones habituales:

- Excluir ficheros específicos de entorno, cachés y logs:
  - `wp-content/cache/`
  - `wp-content/uploads/` (si no quieres versionar medios)
  - `*.log`
- Excluir directorios de herramientas de build (por ejemplo, `node_modules/`, `vendor/` si se reconstruyen en el deploy).
- No versionar ficheros de configuración con credenciales sensibles (`wp-config.php` debería quedar fuera si el repo solo apunta a `wp-content`).

Ejemplo mínimo de `.gitignore` dentro de `wp-content`:

```gitignore
uploads/
cache/
advanced-cache.php
*.log
*.sql
```

Si vas a usar ramas o entornos paralelos (staging, producción), es recomendable mantener una política clara de qué ramas se despliegan en cada entorno y quién puede fusionar a esas ramas.

## 4. Clonar el repositorio en local

### 4.1 Obtener la URL del repositorio desde SiteGround

Una vez creado el repositorio Git en Site Tools, podrás obtener la URL SSH de clonación:

1. Ve a `Site Tools > Devs > Git`.
2. En la tabla de repositorios, localiza el repositorio de tu sitio.
3. Abre el menú de **Acción** (Action) del repositorio y busca la opción "Git clone command" o similar.
4. Copia la URL proporcionada; tendrá el formato SSH asociado a tu usuario del servidor.

Esta URL se usará en el comando `git clone` desde tu máquina local. Asegúrate de que la clave SSH configurada en tu equipo corresponde a la que has creado en Site Tools.

### 4.2 Preparar la clave SSH en tu máquina local

Antes de clonar, debes:

1. Descargar o copiar la **clave privada** desde `Site Tools > Devs > SSH Keys Manager > Action > Private Key`.
2. Guardarla en tu máquina local, normalmente en `~/.ssh/nombre_clave`.
3. Ajustar permisos del archivo:

```bash
chmod 600 ~/.ssh/nombre_clave
```

4. Iniciar el agente SSH y añadir la clave:

```bash
eval `ssh-agent -s`
ssh-add ~/.ssh/nombre_clave
```

Sustituye `nombre_clave` por el nombre real del archivo de clave que has descargado de SiteGround.

### 4.3 Clonar en local (Linux, macOS, Windows)

El comando base es similar en todos los sistemas; cambia únicamente el terminal que uses (Bash, PowerShell, etc.).

#### 4.3.1 Ejemplo genérico de clonación

Supongamos que Site Tools te muestra algo como:

```bash
git clone ssh://usuario@servidor/ruta/al/repositorio.git
```

El flujo típico sería:

```bash
cd ~/proyectos
git clone ssh://usuario@servidor/ruta/al/repositorio.git
cd nombre-del-repo
```

Donde:

- `usuario` es el usuario SSH proporcionado por SiteGround.
- `servidor` puede ser un hostname del tipo `servername.siteground.net`.
- `ruta/al/repositorio.git` es el path interno en el servidor.

#### 4.3.2 Linux / macOS (Terminal, VS Code)

En Linux o macOS, puedes usar el terminal integrado de VS Code:

```bash
# Desde VS Code: Terminal > New Terminal
cd ~/wpdev
git clone ssh://usuario@servidor/ruta/al/repositorio.git
cd nombre-del-repo
code .
```

Esto abrirá el proyecto en VS Code apuntando al directorio clonado. A partir de aquí usarás `git status`, `git add`, `git commit` y `git push` desde el terminal o la interfaz de control de código fuente de VS Code.

#### 4.3.3 Windows (PowerShell, Git Bash, VS Code)

En Windows, el flujo es similar, usando Git Bash o el terminal interno de VS Code:

```bash
cd C:\wpdev
git clone ssh://usuario@servidor/ruta/al/repositorio.git
cd nombre-del-repo
code .
```

Si utilizas Git Bash, asegúrate de que la clave SSH está en `~/.ssh` en el entorno de Git Bash y has ejecutado `ssh-add` con la ruta adecuada.

### 4.4 Uso con VS Code y agentes de IA

Una vez clonado el repositorio, puedes:

- Abrirlo en VS Code (`code .`) y usar su integración con Git para staging, commits y ramas.
- Aprovechar agentes tipo **Claude Code** o extensiones de IA para revisar código, generar funciones, escribir tests, etc., siempre trabajando sobre el directorio clonado.

El flujo recomendado es:

1. Actualizar la rama local desde SiteGround: `git pull`.
2. Crear una rama de feature si procede: `git checkout -b feature/nueva-funcionalidad`.
3. Desarrollar con VS Code y el agente de IA.
4. Hacer commits atómicos y descriptivos.
5. Fusionar y empujar la rama al remoto en SiteGround: `git push origin feature/nueva-funcionalidad` (o directo a la rama principal si vuestro flujo lo permite).

## 5. Flujo de trabajo recomendado con SiteGround, WordPress y Git

### 5.1 Flujo básico de desarrollo

Un flujo sencillo para un equipo de desarrollo podría ser:

**Producción en SiteGround**

- Repositorio Git asociado al WordPress de producción.
- Rama principal (por ejemplo, `main` o `master`) refleja el estado desplegado.

**Clonación en cada equipo**

- Cada desarrollador clona el repo desde SiteGround en su máquina local.
- Configura WordPress local (BD local, `wp-config.php` adaptado al entorno).

**Desarrollo local**

- Uso de VS Code, agente de IA y herramientas de build.
- Commits frecuentes documentando cambios.

**Push al remoto de SiteGround**

- `git push` hacia la rama principal o ramas de integración.
- Opcional: revisión de código entre compañeros si usáis un mirror en GitHub/Bitbucket, etc.

**Despliegue en producción**

- Dependiendo de la configuración, el push al repositorio del servidor actualiza automáticamente archivos del sitio o se ejecuta un paso manual de despliegue (según cómo se haya configurado Git en el servidor).
- Verificación del sitio WordPress tras el deploy.

### 5.2 Rollback y manejo de problemas

En caso de error tras un despliegue:

- Identifica el commit problemático con `git log` y `git diff`.
- Haz un `git checkout` o un revert a un commit estable y empuja los cambios al remoto de SiteGround.
- Si el problema afecta a ficheros no versionados (por ejemplo, base de datos), combina Git con backups y/o herramientas de migración (como plugins de migración de BD).

Es recomendable etiquetar (tags) ciertos estados estables del sitio (por ejemplo, antes de grandes actualizaciones de plugins o del tema) para facilitar el rollback.

## 6. Buenas prácticas específicas para WordPress en SiteGround

- Mantener el repositorio centrado en **código** (temas y plugins), evitando archivos generados y medios pesados, para reducir tamaño y conflictos.
- Mapear claramente qué ramas corresponden a producción, staging y entornos de pruebas.
- Documentar en el README del repo:
  - Cómo configurar el entorno local (BD, `wp-config.php`, URL local).
  - Cómo realizar el despliegue al servidor de SiteGround (comandos, ramas, restricciones).
- Revisar periódicamente el `.gitignore` para evitar incluir archivos sensibles o innecesarios.
- Usar SSH Keys Manager para rotar claves si cambia el equipo o se sospecha de una brecha de seguridad.

## 7. Comandos frecuentes de Git con SiteGround

A continuación se listan los comandos más habituales en un flujo de desarrollo con Git y SiteGround:

```bash
# Ver el estado del repositorio local
git status

# Ver historial de commits
git log --oneline

# Crear una rama nueva para desarrollar una feature
git checkout -b feature/mi-nueva-funcionalidad

# Ver cambios no confirmados
git diff

# Preparar archivos para el commit (staging)
git add nombre-archivo.php
git add .  # Añadir todos los cambios

# Hacer un commit con descripción
git commit -m "Descripción clara del cambio realizado"

# Actualizar la rama local con cambios del servidor
git pull origin main

# Empujar cambios al servidor de SiteGround
git push origin feature/mi-nueva-funcionalidad

# Cambiar a la rama principal y fusionar
git checkout main
git merge feature/mi-nueva-funcionalidad

# Empujar la rama principal (despliegue)
git push origin main

# Crear una etiqueta (tag) para marcar versiones
git tag v1.0.0
git push origin v1.0.0

# Revertir a un commit anterior
git checkout nombre-commit -- archivo.php
# o revertir todo a un commit
git reset --hard nombre-commit
```

## 8. Resolución de conflictos comunes

### Conflicto de merge al fusionar ramas

Si dos desarrolladores modifican el mismo archivo en diferentes ramas, Git detectará un conflicto:

```bash
git merge feature/otra-rama
# Error: Merge conflict in wp-content/themes/mi-tema/style.css
```

Abre el archivo en conflicto (VS Code lo marca automáticamente) y verás las dos versiones:

```
<<<<<<< HEAD
/* Tu cambio en la rama principal */
.mi-clase { color: red; }
=======
/* Cambio de otra rama */
.mi-clase { color: blue; }
>>>>>>> feature/otra-rama
```

Elige cuál mantener (o combina ambas), guarda el archivo y haz:

```bash
git add wp-content/themes/mi-tema/style.css
git commit -m "Resuelto conflicto de merge en style.css"
git push origin main
```

### Error "Permission denied" al clonar

Si recibis un error de permiso:

```
Permission denied (publickey).
```

Verificad que:

1. La clave SSH privada está en `~/.ssh/` con permisos `600`.
2. Has ejecutado `ssh-add ~/.ssh/tu-clave` correctamente.
3. La clave pública registrada en Site Tools coincide con la privada que usas.

## 9. Referencias útiles de SiteGround

- **Herramienta Git en español**: https://es.siteground.com/tutoriales/primeros-pasos/git/
- **¿Qué es SG-Git?**: https://es.siteground.com/kb/que-es-sg-git/
- **Git Tool – Tutorial principal**: https://www.siteground.com/tutorials/getting-started/sg-git/
- **Cómo clonar un repositorio Git**: https://www.siteground.com/tutorials/sg-git/clone-git-repository/
- **Crear repositorio Git en SiteGround**: https://www.siteground.com/tutorials/sg-git/create-new-repository/
- **Clonar desde GitHub a SiteGround**: https://www.siteground.com/tutorials/sg-git/clone-github/

## 10. Conclusión

Git en SiteGround es una herramienta poderosa para equipos de desarrollo que desean versionar código, colaborar de forma ordenada y desplegar cambios de manera controlada. Aunque la curva de aprendizaje inicial puede ser pronunciada, seguir un flujo claro (ramas, commits descriptivos, SSH configurado correctamente) reduce significativamente riesgos y mejora la productividad.

Recuerda mantener tu `.gitignore` actualizado, proteger tus claves SSH, documentar tu flujo de despliegue y hacer commits atómicos y descriptivos. Con estas prácticas, tu equipo podrá gestionar proyectos WordPress en SiteGround de forma profesional y segura.

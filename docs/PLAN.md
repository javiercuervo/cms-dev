# Plan: Claude Code + SiteGround Git + WordPress + VS Code

## Resumen de Alto Nivel

```
┌─────────────────────────────────────────────────────────────────────────┐
│                              FLUJO GENERAL                              │
│                                                                         │
│   CARPETA VACÍA ──► REPO LOCAL ──► SITEGROUND GIT ──► STAGING ──► PROD │
│                                                                         │
│   1. Crear         2. Conectar      3. Push a        4. Probar    5.   │
│      estructura       remoto SG        staging          y validar  Live│
└─────────────────────────────────────────────────────────────────────────┘
```

**El flujo se basa en:**
- Git local como fuente de verdad del código
- SiteGround Git como puente hacia el servidor
- Rama `staging` para pruebas, rama `main` para producción
- VS Code para edición + Claude Code para asistencia inteligente

---

## 1. Diseño del Repositorio

### 1.1 Estructura del Proyecto

```
~/code/Wordpress/mi-proyecto/
│
├── wp-content/
│   ├── themes/
│   │   └── flavor-flavor-flavor/        # Child theme del sitio
│   │       ├── style.css                # Declaración del child theme
│   │       ├── functions.php            # Funciones personalizadas
│   │       ├── templates/               # Templates personalizados
│   │       ├── assets/
│   │       │   ├── css/
│   │       │   ├── js/
│   │       │   └── images/
│   │       └── inc/                     # Includes PHP modulares
│   │
│   ├── plugins/
│   │   └── mi-plugin-custom/            # Plugins propios (si aplica)
│   │
│   └── mu-plugins/                      # Must-use plugins (opcionales)
│
├── docs/
│   ├── README.md                        # Documentación del proyecto
│   ├── PLAN.md                          # Este documento
│   ├── DEPLOYMENT.md                    # Guía de despliegue
│   └── CHANGELOG.md                     # Registro de cambios
│
├── scripts/
│   └── pre-deploy-checklist.md          # Checklist antes de deploy
│
├── .gitignore                           # Exclusiones de Git
├── .claude/
│   └── settings.json                    # Configuración de Claude Code
└── README.md                            # Resumen del proyecto
```

### 1.2 Propósito de Cada Carpeta/Archivo

| Carpeta/Archivo | Propósito |
|-----------------|-----------|
| `wp-content/themes/` | Child theme y temas personalizados. Es el código que se sincroniza con SiteGround |
| `wp-content/plugins/` | Solo plugins desarrollados por ti (no de terceros) |
| `docs/` | Documentación técnica, guías, y changelog |
| `scripts/` | Checklists y scripts de ayuda (no ejecutables en producción) |
| `.gitignore` | Define qué NO versionar (uploads, cache, plugins de terceros) |
| `.claude/settings.json` | Permisos y configuración de Claude Code |

### 1.3 Contenido del .gitignore

```gitignore
# === WordPress Core (NUNCA versionar) ===
/wp-admin/
/wp-includes/
/wp-*.php
/index.php
/xmlrpc.php
/license.txt
/readme.html

# === Configuración sensible ===
wp-config.php
.htaccess
.env
*.log

# === wp-content: excluir lo que no es código ===
wp-content/uploads/
wp-content/upgrade/
wp-content/cache/
wp-content/backup*/
wp-content/wflogs/
wp-content/debug.log

# === Plugins de terceros (instalar via WP Admin) ===
wp-content/plugins/*
!wp-content/plugins/mi-plugin-custom/

# === Temas de terceros ===
wp-content/themes/flavor-flavor-flavor-flavor/
# Mantener solo tu child theme

# === Sistema ===
.DS_Store
Thumbs.db
node_modules/
vendor/
*.sql
*.zip
```

---

## 2. Flujo Git con SiteGround

### 2.1 Estrategia de Ramas

```
main (producción)
  │
  └── staging (desarrollo/pruebas)
        │
        └── feature/* (opcional, para cambios grandes)
```

| Rama | Propósito | Servidor SiteGround |
|------|-----------|---------------------|
| `staging` | Desarrollo y pruebas | staging.tudominio.com |
| `main` | Código estable | tudominio.com (producción) |

### 2.2 Pasos para Conectar con SiteGround

**Paso 1: Configurar SSH en SiteGround**

1. Ir a SiteGround Site Tools → Developers → SSH Keys
2. Agregar tu clave pública (`~/.ssh/id_ed25519.pub`)
3. Esperar confirmación

**Paso 2: Crear repositorio Git en SiteGround**

1. Site Tools → Developers → Git
2. Crear nuevo repositorio para el sitio de staging
3. Copiar la URL del repositorio (formato: `ssh://usuario@servidor:puerto/ruta`)

**Paso 3: Configurar SSH local**

Agregar en `~/.ssh/config`:
```
Host siteground
    HostName tudominio.com
    User tu-usuario-siteground
    Port 18765
    IdentityFile ~/.ssh/id_ed25519
```

**Paso 4: Agregar SiteGround como remoto**
```bash
cd ~/code/Wordpress/mi-proyecto

# Agregar remoto de staging
git remote add staging ssh://usuario@tudominio.com:18765/home/usuario/staging.tudominio.com/public_html

# Verificar remotos
git remote -v
```

**Paso 5: Primer push**
```bash
git push -u staging staging
```

### 2.3 Comandos Git de Referencia

| Acción | Comando |
|--------|---------|
| Ver estado | `git status` |
| Ver cambios | `git diff` |
| Agregar cambios | `git add wp-content/themes/mi-tema/` |
| Commitear | `git commit -m "tipo: descripción"` |
| Push a staging | `git push staging staging` |
| Cambiar a main | `git checkout main` |
| Merge staging→main | `git merge staging` |
| Push a producción | `git push production main` |

---

## 3. Uso Combinado VS Code + Claude Code

### 3.1 Workflow Diario

```
┌──────────────────────────────────────────────────────────────┐
│                    WORKFLOW DIARIO                           │
│                                                              │
│  1. Abrir VS Code          code ~/code/Wordpress/mi-proyecto │
│          ▼                                                   │
│  2. Abrir terminal         Ctrl+` (o Cmd+`)                  │
│          ▼                                                   │
│  3. Iniciar Claude Code    claude                            │
│          ▼                                                   │
│  4. Pedir cambios          "Modifica el header para..."      │
│          ▼                                                   │
│  5. Revisar diff           git diff (en terminal VS Code)    │
│          ▼                                                   │
│  6. Commit                 git add . && git commit -m "..."  │
│          ▼                                                   │
│  7. Push a staging         git push staging staging          │
│          ▼                                                   │
│  8. Verificar en navegador https://staging.tudominio.com     │
└──────────────────────────────────────────────────────────────┘
```

### 3.2 Ejemplo de Sesión con Claude Code

```
Tú: "Abre el archivo functions.php del tema y añade un shortcode
     para mostrar el año actual"

Claude Code:
  - Lee el archivo
  - Propone el cambio
  - (Con tu aprobación) Edita el archivo

Tú: "Haz commit con mensaje descriptivo"

Claude Code:
  - Ejecuta: git add wp-content/themes/mi-tema/functions.php
  - Ejecuta: git commit -m "feat(theme): añade shortcode [current_year]"
```

### 3.3 Buenas Prácticas

**Mensajes de commit (Conventional Commits):**
```
feat: nueva funcionalidad
fix: corrección de bug
style: cambios de CSS/formato
refactor: reorganización de código
docs: documentación
chore: tareas de mantenimiento
```

Ejemplos:
```
feat(theme): añade slider en homepage
fix(theme): corrige menú móvil que no cierra
style(theme): ajusta espaciado en footer
```

**Revisar antes de commit:**
1. `git status` - Ver qué archivos cambiaron
2. `git diff` - Ver exactamente qué líneas cambiaron
3. Probar localmente si es posible
4. Commit con mensaje claro

**No commitear:**
- Archivos de configuración local
- Credenciales o datos sensibles
- Archivos generados automáticamente

---

## 4. Flujo Staging → Producción

### 4.1 Diagrama del Flujo

```
LOCAL                    STAGING                   PRODUCCIÓN
  │                         │                          │
  │  git push staging       │                          │
  ├────────────────────────►│                          │
  │                         │                          │
  │                    [PROBAR]                        │
  │                    [VALIDAR]                       │
  │                         │                          │
  │  git checkout main      │                          │
  │  git merge staging      │                          │
  │  git push production    │                          │
  ├─────────────────────────┼─────────────────────────►│
  │                         │                          │
  │                         │                     [EN VIVO]
```

### 4.2 Checklist Pre-Producción

Ver archivo completo: [pre-deploy-checklist.md](../scripts/pre-deploy-checklist.md)

**Resumen rápido:**
- [ ] Cambios funcionan en staging
- [ ] Probado en móvil y desktop
- [ ] Sin errores en consola
- [ ] Sin código de debug
- [ ] Backup disponible

### 4.3 Proceso de Deploy a Producción

**Opción A: Usando SiteGround Staging Tool (Recomendado)**

1. En SiteGround: Site Tools → WordPress → Staging
2. Click en "Push to Live"
3. Seleccionar qué sincronizar (archivos, DB, o ambos)
4. Confirmar

**Opción B: Usando Git directamente**

```bash
# 1. Asegurarse de estar en main
git checkout main

# 2. Merge de staging (ya probado)
git merge staging

# 3. Push a producción
git push production main

# 4. Verificar en el sitio
```

### 4.4 Rollback en Caso de Problemas

```bash
# Ver historial de commits
git log --oneline -5

# Revertir último commit
git revert HEAD

# Push del revert
git push production main
```

O usar backup de SiteGround: Site Tools → Security → Backups

---

## 5. Checklist de Implementación

### FASE 1: PREPARACIÓN LOCAL ✅
- [x] Crear carpeta del proyecto
- [x] Ejecutar `git init`
- [x] Crear estructura de carpetas (wp-content/, docs/, scripts/)
- [x] Crear .gitignore con exclusiones correctas
- [x] Crear README.md básico
- [x] Primer commit: "chore: estructura inicial"

### FASE 2: CONFIGURAR SITEGROUND ✅
- [x] Acceder a SiteGround Site Tools
- [x] Developers → SSH Keys: clave creada `cms-git-proportione`
- [x] Developers → Git: repositorio creado para staging19
- [x] URL copiada: `ssh://u7-hsfspysgq8vx@c1121528.sgvps.net:18765/...`
- [x] Conexión SSH verificada: `ssh siteground-proportione "echo ok"`

### FASE 3: CONECTAR REPOSITORIOS ✅
- [x] GitHub configurado como `origin`: https://github.com/javiercuervo/cms-dev
- [x] SiteGround configurado como `siteground-staging`
- [x] Push inicial a GitHub completado
- [x] Deploy via rsync configurado

### FASE 4: DESARROLLO INICIAL ✅
- [x] Child theme extraído de staging (twentytwentythree-child)
- [x] Agregado a wp-content/themes/
- [x] Proyecto abierto en VS Code + Claude Code
- [x] Cambio de prueba realizado (style.css + functions.php)
- [x] Commit y push a GitHub

### FASE 5: VALIDAR FLUJO COMPLETO ✅
- [x] Deploy a staging19.proportione.com verificado
- [x] CSS del child theme cargando correctamente
- [ ] Merge staging → main (pendiente cuando haya cambios estables)
- [ ] Deploy a producción (pendiente)

### FASE 6: DOCUMENTAR ✅
- [x] docs/DEPLOYMENT.md actualizado
- [x] Credenciales en keys/ACCESOS.md (excluido de git)
- [x] Script deploy-staging.sh creado
- [x] Documentación técnica añadida (siteground-git.md, wordpress-api-claude-code.md)

---

## 6. Riesgos y Mitigación

| Riesgo | Probabilidad | Impacto | Mitigación |
|--------|--------------|---------|------------|
| **Push accidental a producción** | Media | Alto | Usar ramas separadas. Nunca hacer push a main directamente |
| **Subir credenciales al repo** | Media | Crítico | .gitignore robusto. Revisar `git diff` antes de commit |
| **Sobrescribir uploads/media** | Baja | Alto | Excluir wp-content/uploads/ en .gitignore |
| **Conflictos de merge** | Media | Medio | Commits pequeños y frecuentes |
| **Romper el sitio en producción** | Baja | Alto | SIEMPRE probar en staging primero. Tener backup |
| **Perder acceso SSH** | Baja | Medio | Documentar credenciales. Tener acceso alternativo |
| **Olvidar hacer backup** | Media | Alto | SiteGround hace backups automáticos. Verificar que estén activos |

---

## 7. Comandos de Referencia Rápida

```bash
# === DIARIO ===
git status                    # Ver cambios pendientes
git diff                      # Ver qué cambió
git add [archivo]             # Agregar archivo específico
git commit -m "tipo: mensaje" # Commitear
git push staging staging      # Subir a staging

# === DEPLOY A PRODUCCIÓN ===
git checkout main
git merge staging
git push production main

# === EMERGENCIAS ===
git revert HEAD               # Deshacer último commit
git stash                     # Guardar cambios temporalmente
git log --oneline -10         # Ver últimos commits

# === VERIFICACIÓN ===
git remote -v                 # Ver remotos configurados
git branch -a                 # Ver todas las ramas
ssh siteground "pwd"          # Probar conexión SSH
```

---

## 8. Verificación del Plan

Una vez implementado completamente, verificar:

1. **SSH funciona**: `ssh siteground "pwd"`
2. **Push a staging funciona**: hacer cambio pequeño y verificar en staging
3. **Staging → Producción funciona**: merge a main y verificar en producción
4. **Rollback funciona**: hacer `git revert` de prueba

---

*Documento creado: Enero 2026*
*Última actualización: Enero 2026*

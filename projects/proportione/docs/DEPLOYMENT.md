# Guía de Despliegue - Proportione

## URLs del Proyecto

| Entorno | URL | Rama Git |
|---------|-----|----------|
| Staging | https://staging19.proportione.com | `staging` |
| Producción | https://proportione.com | `main` |
| GitHub | https://github.com/javiercuervo/cms-dev | código fuente |

## Configuración SSH

Archivo `~/.ssh/config`:

```
Host siteground-proportione
    HostName ssh.proportione.com
    User u7-hsfspysgq8vx
    Port 18765
    IdentityFile ~/.ssh/siteground_key
```

**Passphrase de la clave SSH:** `Q$U*1c0wJnETN`

## Remotos Git

```bash
# Ver remotos configurados
git remote -v

# GitHub (código fuente)
origin    https://github.com/javiercuervo/cms-dev.git

# SiteGround Staging (deploy)
siteground-staging    ssh://u7-hsfspysgq8vx@c1121528.sgvps.net:18765/home/customer/www/staging19.proportione.com/public_html/
```

## Proceso de Deploy

### 1. Commit a GitHub

```bash
git add .
git commit -m "tipo: descripción del cambio"
git push origin staging
```

### 2. Deploy a Staging

```bash
# Opción A: Script automático
./scripts/deploy-staging.sh

# Opción B: Manual
rsync -avz wp-content/themes/twentytwentythree-child/ \
  siteground-proportione:/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/twentytwentythree-child/
```

### 3. Verificar

Abrir https://staging19.proportione.com/ y comprobar cambios.

### 4. A Producción (cuando esté listo)

**Opción A: Via SiteGround Staging Tool (Recomendado)**
1. Site Tools → WordPress → Staging
2. Click en "Push to Live"
3. Seleccionar archivos y/o base de datos
4. Confirmar

**Opción B: Merge a main**
```bash
git checkout main
git merge staging
git push origin main
```

## Rollback

```bash
# Ver últimos commits
git log --oneline -5

# Revertir último commit
git revert HEAD
git push origin staging

# Re-deploy
./scripts/deploy-staging.sh
```

O usar backups de SiteGround: Site Tools → Security → Backups

## Estructura del Child Theme

```
wp-content/themes/twentytwentythree-child/
├── style.css       # Estilos personalizados
└── functions.php   # Funciones PHP (enqueue, hooks, etc.)
```

## Convención de Commits

```
feat: nueva funcionalidad
fix: corrección de bug
style: cambios de CSS/formato
refactor: reorganización de código
docs: documentación
chore: tareas de mantenimiento
test: pruebas
```

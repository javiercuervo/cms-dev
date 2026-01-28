# Guía de Despliegue

## URLs del Proyecto

| Entorno | URL | Rama Git |
|---------|-----|----------|
| Staging | https://staging.tudominio.com | `staging` |
| Producción | https://tudominio.com | `main` |

## Configuración SSH

Archivo `~/.ssh/config`:

```
Host siteground
    HostName tudominio.com
    User tu-usuario-siteground
    Port 18765
    IdentityFile ~/.ssh/id_ed25519
```

## Remotos Git

```bash
# Ver remotos configurados
git remote -v

# Staging
staging  ssh://usuario@tudominio.com:18765/home/usuario/staging.tudominio.com/public_html

# Producción (cuando esté configurado)
production  ssh://usuario@tudominio.com:18765/home/usuario/public_html
```

## Proceso de Deploy

### A Staging

```bash
git add .
git commit -m "tipo: descripción del cambio"
git push staging staging
```

### A Producción

**Opción A: Via Git**
```bash
git checkout main
git merge staging
git push production main
```

**Opción B: Via SiteGround (Recomendado)**
1. Site Tools → WordPress → Staging
2. Click en "Push to Live"
3. Seleccionar archivos y/o base de datos
4. Confirmar

## Rollback

```bash
# Ver últimos commits
git log --oneline -5

# Revertir último commit
git revert HEAD
git push [remote] [rama]
```

O usar backups de SiteGround: Site Tools → Security → Backups

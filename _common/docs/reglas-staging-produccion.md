# Reglas de Staging y Producción

## REGLA FUNDAMENTAL

**Claude Code SOLO trabaja en servidores de staging. NUNCA en producción.**

El paso de staging a producción se realiza exclusivamente desde la consola de SiteGround.

---

## Flujo de Trabajo

```
┌─────────────────┐      ┌─────────────────┐      ┌─────────────────┐
│                 │      │                 │      │                 │
│   LOCAL (dev)   │ ───► │    STAGING      │ ───► │   PRODUCCIÓN    │
│                 │      │                 │      │                 │
└─────────────────┘      └─────────────────┘      └─────────────────┘
        │                        │                        │
   Claude Code              Claude Code              SiteGround
   puede editar            puede editar              Console SOLO
```

### 1. Desarrollo Local

Claude Code puede:
- Crear y editar archivos locales
- Preparar CSS, PHP, plantillas
- Ejecutar comandos Git localmente

### 2. Staging

Claude Code puede:
- Conectarse vía SSH
- Ejecutar WP-CLI
- Subir archivos vía rsync/scp
- Modificar base de datos
- Crear/editar templates de Elementor
- Purgar caches

### 3. Producción

Claude Code **NO PUEDE**:
- Conectarse vía SSH a producción
- Ejecutar comandos en producción
- Modificar archivos en producción
- Tocar la base de datos de producción

El paso a producción lo realiza el usuario desde:
**SiteGround Site Tools → WordPress → Staging → "Push to Live"**

---

## Identificación de Entornos

### Staging
- URL contiene `staging` (ej: `staging19.proportione.com`)
- Ruta servidor: `/home/customer/www/staging*.dominio.com/`

### Producción
- URL principal sin `staging` (ej: `proportione.com`)
- Ruta servidor: `/home/customer/www/dominio.com/`

---

## Configuración SSH

El archivo `~/.ssh/config` debe apuntar SIEMPRE a rutas de staging:

```
Host siteground-nombreproyecto
    HostName ssh.dominio.com
    User usuario-siteground
    Port 18765
    IdentityFile ~/.ssh/siteground_key
```

Y los scripts de deploy deben usar rutas de staging:
```bash
REMOTE_PATH="/home/customer/www/staging*.dominio.com/public_html/..."
```

---

## Checklist Antes de Cualquier Acción Remota

Antes de ejecutar CUALQUIER comando SSH o deploy:

1. [ ] ¿La URL/ruta contiene `staging`?
2. [ ] ¿El script de deploy apunta a staging?
3. [ ] ¿El comando usa la ruta de staging?

Si alguna respuesta es NO → **DETENER** y verificar.

---

## Comandos Prohibidos en Producción

Claude Code **NUNCA** ejecutará estos comandos apuntando a producción:

- `ssh` a rutas sin `staging`
- `rsync` a rutas sin `staging`
- `scp` a rutas sin `staging`
- `wp` CLI en producción
- Cualquier modificación de archivos/DB en producción

---

## Excepciones

**No hay excepciones.** Incluso si el usuario lo solicita, Claude Code debe:

1. Recordar esta regla
2. Sugerir usar la consola de SiteGround
3. Ofrecer preparar los cambios en staging para posterior push manual

---

## Registro de Cambios

Todos los cambios en staging deben documentarse en:
`projects/[nombre]/docs/CHANGELOG-STAGING.md`

Esto facilita saber qué se ha modificado antes de hacer push a producción.

---

## Fecha de esta regla

Establecida: 2026-01-28

Esta regla es **inmutable** y aplica a todos los proyectos WordPress gestionados con Claude Code.

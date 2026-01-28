# CMS Dev - WordPress Projects

Repositorio de desarrollo para proyectos WordPress gestionados con Git.

## Estructura

```
cms-dev/
│
├── _common/                         # Recursos compartidos
│   ├── docs/                        # Documentación general WordPress
│   │   ├── siteground-git.md
│   │   └── wordpress-api-claude-code.md
│   └── scripts/                     # Scripts reutilizables
│
├── projects/                        # Proyectos por cliente
│   └── proportione/                 # Proyecto Proportione
│       ├── wp-content/themes/       # Child themes
│       ├── docs/                    # Documentación del proyecto
│       ├── scripts/                 # Scripts de deploy
│       └── keys/                    # Credenciales (gitignored)
│
├── .gitignore
└── README.md
```

## Proyectos Activos

| Proyecto | Staging | Producción | Estado |
|----------|---------|------------|--------|
| Proportione | [staging19.proportione.com](https://staging19.proportione.com) | [proportione.com](https://proportione.com) | ✅ Activo |

## Documentación

### General
- [_common/docs/siteground-git.md](_common/docs/siteground-git.md) - Guía Git + SiteGround
- [_common/docs/wordpress-api-claude-code.md](_common/docs/wordpress-api-claude-code.md) - WordPress API

### Por Proyecto
- [projects/proportione/docs/DEPLOYMENT.md](projects/proportione/docs/DEPLOYMENT.md) - Deploy Proportione
- [projects/proportione/docs/PLAN.md](projects/proportione/docs/PLAN.md) - Plan del proyecto

## Flujo de Trabajo

```bash
# 1. Editar código del proyecto
cd projects/proportione/

# 2. Commit a GitHub
git add . && git commit -m "feat(proportione): descripción"
git push origin staging

# 3. Deploy a staging
./scripts/deploy-staging.sh

# 4. Verificar y luego producción via SiteGround
```

## Convención de Commits

```
feat(proyecto): nueva funcionalidad
fix(proyecto): corrección de bug
style(proyecto): cambios de CSS
docs: documentación
chore: mantenimiento
```

## Añadir Nuevo Proyecto

```bash
mkdir -p projects/nuevo-cliente/{wp-content/themes,docs,scripts,keys}
# Copiar estructura de proportione como base
```

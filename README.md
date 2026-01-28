# Mi Proyecto WordPress

Repositorio de desarrollo para el sitio WordPress.

## Estructura

```
wp-content/
├── themes/flavor-flavor-flavor/   # Child theme personalizado
├── plugins/mi-plugin-custom/      # Plugins propios
└── mu-plugins/                    # Must-use plugins
```

## Documentación

- [docs/PLAN.md](docs/PLAN.md) - Plan completo del flujo de trabajo
- [docs/DEPLOYMENT.md](docs/DEPLOYMENT.md) - Guía de despliegue
- [docs/technical/](docs/technical/) - Documentación técnica

## Flujo de Trabajo

1. Desarrollar en rama `staging`
2. Push a SiteGround: `git push staging staging`
3. Probar en staging.tudominio.com
4. Merge a `main` y push a producción

## Comandos Útiles

```bash
git status                    # Ver cambios pendientes
git diff                      # Ver qué cambió
git add [archivo]             # Agregar archivo específico
git commit -m "tipo: mensaje" # Commitear
git push staging staging      # Subir a staging
```

## Convención de Commits

- `feat:` nueva funcionalidad
- `fix:` corrección de bug
- `style:` cambios de CSS/formato
- `refactor:` reorganización de código
- `docs:` documentación
- `chore:` tareas de mantenimiento

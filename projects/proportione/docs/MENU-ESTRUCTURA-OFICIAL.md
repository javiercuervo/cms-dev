# Estructura Oficial del Menu Principal - Proportione

**Ultima actualizacion:** 2026-01-31
**Version:** 2.0

---

## IMPORTANTE: URLs Canonicas

Cuando se actualicen URLs de paginas, SIEMPRE actualizar tambien el menu.
Las redirecciones 301 NO son suficientes - el menu debe apuntar a las URLs finales.

---

## Estructura del Menu

```
Menu Principal (ID: 2)
├── Servicios (/servicios/) [ID: 2904]
│   ├── Consultoria de negocio (/consultoria-negocio/) [ID: 2921]
│   ├── Estrategia de Innovacion (/estrategia-innovacion/) [ID: 2933]
│   ├── Transformacion Digital (/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-transformacion-digital/) [ID: 2936]
│   ├── Inteligencia Artificial (/ia-generativa/) [ID: 2926]
│   └── eCommerce & Retail (/estrategia-omnicanal-retail/) [ID: 2927]
│
├── Nosotros (/nosotros/) [ID: 2806]
│   ├── Divina Proportione (/filosofia/) [ID: 2937]
│   ├── Metodologia (/metodologia/) [ID: 2918]
│   ├── Mayte Tortosa (/mayte-tortosa/) [ID: 2919]
│   └── Javier Cuervo (/javier-cuervo/) [ID: 2920]
│
├── Insights (/blog/) [ID: 2929]
│   ├── Blog (/blog/) [ID: 2934]
│   └── Investigacion (/investigacion/) [ID: 2930]
│
└── Contacto (/contacto/) [ID: 2825]
```

---

## Mapeo de Redirecciones

Cuando una URL cambia, actualizar AMBOS:

| URL Antigua | URL Nueva | Menu Item ID |
|-------------|-----------|--------------|
| `/inteligencia-artificial-generativa/` | `/ia-generativa/` | 2926 |
| `/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/` | `/estrategia-omnicanal-retail/` | 2927 |
| `/estrategia-tecnologia-y-personas/divina-proportione/` | `/filosofia/` | 2937 |

---

## Comandos WP-CLI para Actualizar Menu

### Ver estructura actual
```bash
wp menu item list 'menu-principal' --fields=db_id,title,link,menu_item_parent --format=table
```

### Actualizar URL de un item
```bash
# Metodo 1: via post meta (mas confiable)
wp post meta update <MENU_ITEM_ID> _menu_item_url '<NUEVA_URL>'

# Metodo 2: via menu item update
wp menu item update <MENU_ITEM_ID> --url='<NUEVA_URL>'
```

### Ejemplo: Actualizar Inteligencia Artificial
```bash
wp post meta update 2926 _menu_item_url '/ia-generativa/'
wp cache flush
```

---

## Checklist: Cambio de URL

Cuando cambies una URL de pagina:

- [ ] 1. Actualizar slug del post/pagina
- [ ] 2. Configurar redireccion 301 en functions.php
- [ ] 3. **Actualizar URL en el menu** (este paso se olvida frecuentemente)
- [ ] 4. Limpiar cache (`wp cache flush`)
- [ ] 5. Verificar menu en frontend

---

## Script de Verificacion

Ejecutar para verificar consistencia del menu:

```bash
#!/bin/bash
# Verificar que los enlaces del menu funcionan

URLS=(
  "/ia-generativa/"
  "/estrategia-omnicanal-retail/"
  "/filosofia/"
  "/investigacion/"
  "/contacto/"
  "/metodologia/"
)

for url in "${URLS[@]}"; do
  status=$(curl -sI "https://staging19.proportione.com$url" | head -1)
  echo "$url -> $status"
done
```

---

## Errores Comunes

1. **Solo configurar redireccion 301**: El menu sigue apuntando a URL antigua
2. **Olvidar limpiar cache**: Los cambios no se reflejan inmediatamente
3. **Usar URL absoluta vs relativa**: Preferir URLs relativas (`/pagina/`)

---

## Historial de Cambios

| Fecha | Cambio | Items Afectados |
|-------|--------|-----------------|
| 2026-01-31 | URLs SEO optimizadas | 2926, 2927, 2937 |

# WordPress API + Claude Code: Capacidades y Casos de Uso

**Documento técnico | Integración de APIs de WordPress con agentes IA (Anthropic Claude Code)**

---

## 1. Panorama general

### 1.1 WordPress REST API y otras interfaces

WordPress expone múltiples interfaces de programación para su integración con sistemas externos:

#### **REST API (la principal)**
- **Especificación**: OpenAPI/REST standard, documentada en https://developer.wordpress.org/rest-api/reference/
- **Base URL**: `/wp-json/wp/v2/`
- **Métodos HTTP**: GET, POST, PUT, DELETE (CRUD completo)
- **Formato de datos**: JSON exclusivamente
- **Versión actual**: v2 (estable desde WordPress 4.7, 2016)
- **CORS**: Soportado nativamente para solicitudes desde diferentes dominios

**Endpoints principales:**
- Posts: `/wp-json/wp/v2/posts`
- Pages: `/wp-json/wp/v2/pages`
- Users: `/wp-json/wp/v2/users`
- Media: `/wp-json/wp/v2/media`
- Taxonomies (categorías, etiquetas): `/wp-json/wp/v2/[taxonomy]`
- Custom Post Types: `/wp-json/wp/v2/[custom_type]`
- Menús: `/wp-json/wp/v2/menus`
- Comentarios: `/wp-json/wp/v2/comments`
- Capacidades: `/wp-json/wp/v2/users/me/capabilities`
- Bloques/Patterns: `/wp-json/wp/v2/block-types`
- FSE (Full Site Editing): `/wp-json/wp/v2/templates`, `/wp-json/wp/v2/template-parts`

#### **WP-CLI (Command Line Interface)**
- Herramienta CLI oficial para WordPress v2.12.0+
- Permite operaciones programáticas sin interfaz web
- Ideal para agentes que necesitan acceso local/SSH
- Comandos: `wp post`, `wp user`, `wp plugin`, `wp db`, `wp eval`, etc.
- Sitio: https://wp-cli.org

#### **XML-RPC (legacy, no recomendado)**
- Protocolo antiguo; WordPress lo mantiene por compatibilidad
- Desactivable por seguridad: `add_filter('xmlrpc_enabled', '__return_false');`
- No se cubre en detalle en este documento (REST API es superior)

#### **WordPress Abilities API (nuevo, 2025)**
- Framework nativo para exponer capacidades a agentes IA
- Permite registrar "abilities" (funciones bien definidas) con esquemas JSON
- Automáticamente expuestas en REST bajo `/wp-json/wp-abilities/v1`
- Soporta callbacks PHP y JavaScript
- Sitio: https://developer.wordpress.org/apis/wordpress-org/abilities/

---

### 1.2 Claude Code y el modelo agentic de Anthropic

**Claude Code** es el entorno agentic de Anthropic para desarrollo de software que se ejecuta en la plataforma de Anthropic (https://code.claude.com/).

#### **Características clave (2025)**
- **Modelos subyacentes**: Claude 3.5 Opus 4.5 (reasoning avanzado, mejor para agentes)
- **Subagentes**: Múltiples agentes colaborativos dentro de un flujo
- **Integración con herramientas**: MCP (Model Context Protocol) como patrón principal
- **Alcance del agente**: Puede leer/escribir archivos, ejecutar comandos, crear commits, acceder a APIs
- **Multi-agent loops**: Agentes en paralelo para tareas complejas
- **API accesible**: Endpoints OpenAI-compatible para orquestación programática

#### **Modelo Context Protocol (MCP)**
- Protocolo abierto para que las IA accedan a herramientas externas
- **Transporte HTTP remoto**: Ideal para APIs en línea (REST API de WordPress)
- **Transporte stdio**: Para servidores locales (WP-CLI)
- **Autenticación**: OAuth 2.0, Bearer tokens, headers customizados
- **Configuración**: `.mcp.json` (proyecto), `claude_desktop_config.json` (usuario), `managed-mcp.json` (enterprise)
- Documentación: https://code.claude.com/docs/en/mcp

---

## 2. Capacidades de la API de WordPress (vista "Claude Code")

### 2.1 Gestión de posts, páginas y Custom Post Types (CPT)

#### **Qué permite:**
- Crear, leer, actualizar y eliminar posts/páginas de forma programática
- Filtrar por autor, fecha, estado (draft, publish, pending, scheduled)
- Controlar contenido en HTML o texto plano (con/sin bloques Gutenberg)
- Generar/modificar slugs y permalinks
- Gestionar publicación (fecha, estado, visibilidad)
- Acceso a revisiones de contenido

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/posts                      # Listar posts
POST   /wp-json/wp/v2/posts                      # Crear post
GET    /wp-json/wp/v2/posts/{id}                 # Obtener post específico
PUT    /wp-json/wp/v2/posts/{id}                 # Actualizar post
DELETE /wp-json/wp/v2/posts/{id}                 # Eliminar post

# Custom Post Types
GET    /wp-json/wp/v2/{custom_type}
POST   /wp-json/wp/v2/{custom_type}
PUT    /wp-json/wp/v2/{custom_type}/{id}
```

#### **Parámetros útiles para filtrado:**
```
?search=término                 # Búsqueda de texto
?author=123                     # Posts de un autor
?status=draft,publish           # Estados específicos
?per_page=100                   # Límite de resultados (máx. 100)
?page=2                         # Paginación
?orderby=date&order=desc        # Ordenamiento
?_fields=id,title,content       # Campos específicos (reduce payload)
```

#### **Cómo lo aprovecha Claude Code:**
- Un agente puede listar todos los posts no publicados y evaluar su calidad
- Actualizar metadatos de posts a escala (SEO, categorías)
- Refactorizar contenido: cambiar formatos de bloques, reorganizar estructura
- Generar borradores de posts basados en plantillas o datos externos
- Recuperar posts para análisis de contenido (traducciones, análisis de sentimiento)

---

### 2.2 Usuarios, roles y permisos

#### **Qué permite:**
- Crear, listar y modificar usuarios
- Asignar/revocar roles (editor, autor, contributor, subscriber, custom roles)
- Gestionar capacidades específicas
- Cambiar contraseñas y correos
- Acceso a metadatos de usuario (perfil, preferencias)
- Listar y modificar roles customizados

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/users                      # Listar usuarios
POST   /wp-json/wp/v2/users                      # Crear usuario
GET    /wp-json/wp/v2/users/{id}                 # Obtener usuario
PUT    /wp-json/wp/v2/users/{id}                 # Actualizar usuario
DELETE /wp-json/wp/v2/users/{id}                 # Eliminar usuario

GET    /wp-json/wp/v2/users/me                   # Usuario autenticado actual
GET    /wp-json/wp/v2/users/me/capabilities      # Capacidades del usuario
```

#### **Control de permisos:**
- Cada endpoint respeta el modelo de permisos de WordPress
- `publish_posts` - publicar contenido
- `edit_others_posts` - editar posts de otros
- `delete_users` - eliminar usuarios
- Roles definibles por sitio, controlables vía REST

#### **Cómo lo aprovecha Claude Code:**
- Auditar permisos: identificar usuarios con acceso innecesario
- Crear cuentas de servicio con roles limitados (e.g., "API Editor" con permisos restringidos)
- Revocar acceso masivo ante incidentes de seguridad
- Mapear quién editó qué contenido (auditoría combinada con logs)

---

### 2.3 Media (imágenes, archivos, adjuntos)

#### **Qué permite:**
- Subir archivos (imágenes, PDFs, etc.) con soporte multipart
- Listar y eliminar archivos
- Obtener metadatos (dimensiones, alt-text, MIME type)
- Acceso a URL de archivos en diferentes tamaños
- Gestión de descripciones y atributos de accesibilidad

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/media                      # Listar archivos
POST   /wp-json/wp/v2/media                      # Subir archivo
GET    /wp-json/wp/v2/media/{id}                 # Obtener metadatos
DELETE /wp-json/wp/v2/media/{id}                 # Eliminar archivo
```

#### **Ejemplo: Subir una imagen**
```bash
curl -X POST https://example.com/wp-json/wp/v2/media \
  -H "Authorization: Bearer {TOKEN}" \
  -F "file=@imagen.jpg" \
  -F "title=Mi Imagen" \
  -F "alt_text=Descripción accesible"
```

#### **Cómo lo aprovecha Claude Code:**
- Auditar imágenes sin alt-text (accesibilidad)
- Renombrar/actualizar metadatos masivamente
- Eliminar archivos huérfanos (no referencias en posts)
- Procesar imágenes: regenerar thumbnails, optimizar tamaño
- Integrar con servicios de CDN o transformación de imágenes

---

### 2.4 Taxonomías (categorías, etiquetas, CPT taxonomies)

#### **Qué permite:**
- Crear, listar, actualizar y eliminar términos de taxonomías
- Asignar términos a posts
- Gestionar jerarquías (padre-hijo)
- Controlar descripción y slug de cada término

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/categories                 # Listar categorías
POST   /wp-json/wp/v2/categories                 # Crear categoría
PUT    /wp-json/wp/v2/categories/{id}            # Actualizar
DELETE /wp-json/wp/v2/categories/{id}            # Eliminar

GET    /wp-json/wp/v2/tags                       # Idem para etiquetas

# Custom taxonomies
GET    /wp-json/wp/v2/{custom_taxonomy}
```

#### **Filtrado por taxonomía:**
```
GET /wp-json/wp/v2/posts?categories=5,10         # Posts de categorías 5 o 10
GET /wp-json/wp/v2/posts?tags=tech,wordpress    # Posts con etiquetas específicas
```

#### **Cómo lo aprovecha Claude Code:**
- Reorganizar estructura de categorías (fusionar, dividir)
- Etiquetar contenido a escala basándose en análisis NLP
- Detectar categorías huérfanas (sin posts)
- Aplicar cambios de nombres de categorías globalmente

---

### 2.5 Metadatos y campos personalizados

#### **Qué permite:**
- Acceso a metadatos (post_meta, user_meta, term_meta)
- Lectura y escritura de pares clave-valor arbitrarios
- Registro de campos custom para validación de REST

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/posts/{id}                 # Incluye campo "meta" si registrado
PUT    /wp-json/wp/v2/posts/{id}                 # Actualizar post y meta simultáneamente
```

#### **Registrar campos custom para REST (en functions.php):**
```php
add_action('rest_api_init', function() {
    register_post_meta('post', 'seo_keywords', array(
        'show_in_rest' => true,
        'type' => 'string',
        'single' => true,
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        }
    ));
});
```

#### **Respuesta con metadatos:**
```json
{
  "id": 1,
  "title": "Mi Post",
  "content": "...",
  "meta": {
    "seo_keywords": "wordpress, api, rest"
  }
}
```

#### **Filtrado por metadatos:**
Usar hooks de WordPress (no es parámetro directo de REST):
```php
add_filter('rest_post_query', function($args, $request) {
    if (isset($request['meta_key'])) {
        $args['meta_key'] = sanitize_text_field($request['meta_key']);
        $args['meta_value'] = sanitize_text_field($request['meta_value']);
    }
    return $args;
}, 10, 2);
```

#### **Cómo lo aprovecha Claude Code:**
- Acceder a campos personalizados (ACF, pods, tipos de datos custom)
- Auditar metadatos inconsistentes o vacíos
- Migrar metadatos entre estructuras
- Generar reportes basados en metadatos

---

### 2.6 Menús y estructuras de navegación

#### **Qué permite:**
- Listar menús registrados
- Obtener elementos de menú y su jerarquía
- Crear y modificar menús
- Controlar asignación de menús a ubicaciones

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/menus                      # Listar menús
GET    /wp-json/wp/v2/menus/{id}                 # Obtener menú
POST   /wp-json/wp/v2/menus                      # Crear menú

GET    /wp-json/wp/v2/menu-items                 # Listar items
POST   /wp-json/wp/v2/menu-items                 # Crear item
PUT    /wp-json/wp/v2/menu-items/{id}            # Actualizar
```

#### **Cómo lo aprovecha Claude Code:**
- Reorganizar navegación principal automáticamente
- Detectar enlaces rotos en menús
- Sincronizar menús entre sitios multisite

---

### 2.7 Opciones de sitio (settings)

#### **Qué permite:**
- Leer y modificar opciones del sitio (blog title, description, URL, etc.)
- Acceso a configuración de plugins/temas via `get_option()` en REST

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/settings                   # Obtener configuración pública
POST   /wp-json/wp/v2/settings                   # Modificar configuración (admin)
```

#### **Cómo lo aprovecha Claude Code:**
- Auditar configuración de seguridad (SSL, permisos)
- Hacer cambios de configuración global (URL, jumlah posts por página)

---

### 2.8 Full Site Editing (FSE) y bloques

#### **Qué permite (WordPress 5.9+):**
- Acceso a plantillas de sitio (templates)
- Acceso a partes de plantilla (template parts)
- Lectura y modificación de bloques y contenido JSON
- Acceso a `theme.json` (estilos globales) via REST
- Patrones reutilizables

#### **Endpoints clave:**
```
GET    /wp-json/wp/v2/templates                  # Listar plantillas
PUT    /wp-json/wp/v2/templates/{id}             # Actualizar plantilla
GET    /wp-json/wp/v2/template-parts             # Partes reutilizables
```

#### **Estructura de bloques (JSON):**
```json
{
  "id": 1,
  "content": "<!-- wp:paragraph {\"align\":\"center\"} -->\n<p>Contenido</p>\n<!-- /wp:paragraph -->"
}
```

#### **Cómo lo aprovecha Claude Code:**
- Refactorizar plantillas: cambiar bloques, reorganizar layout
- Auditar bloques inusados o deprecated
- Sincronizar cambios de tema entre sitios
- Automatizar cambios visuales a escala

---

### 2.9 Seguridad, autenticación y autorización

#### **Métodos de autenticación soportados:**

**1. Cookie Authentication (sesión de navegador)**
- Validada automáticamente si estás logged in
- Requiere header `X-WP-Nonce` para escribir
- Insegura para producción (vulnerable a CSRF)

**2. Application Passwords (mejor para scripts/bots)**
- Generables en `/wp-admin/profile.php`
- Combinación usuario:contraseña en HTTP Basic Auth
- URL: `https://usuario:password@example.com/wp-json/...`
- Altamente recomendado para agentes IA

```bash
curl -X GET https://example.com/wp-json/wp/v2/posts \
  -u usuario:aplicacion_pass
```

**3. OAuth 2.0**
- Delegación segura sin exponer contraseña
- Flujo: código de autorización + token de acceso + refresh token
- Para integraciones third-party (Claude Code como servicio externo)

**4. JWT (JSON Web Tokens)**
- No nativo; requiere plugin (Simple JWT)
- Header: `Authorization: Bearer {JWT_TOKEN}`
- Tokens firmados criptográficamente

**5. Custom tokens / API keys**
- Implementables via hooks de WordPress
- Validación customizada en `rest_api_init`

#### **Headers de seguridad recomendados:**
```
X-WP-Nonce: {nonce_value}              # Prevenir CSRF (para cambios)
Authorization: Bearer {TOKEN}           # Autenticación
Content-Type: application/json          # Tipo de datos
Accept: application/json
HTTPS                                   # Obligatorio en producción
```

#### **Limitaciones y riesgos:**

| Riesgo | Descripción | Mitigación |
|--------|-------------|------------|
| **Rate limiting** | Sin límite nativo; plugins/servidor pueden limitarlo | Implementar con `rest_pre_serve_request` hook |
| **Data exposure** | Posts/usuarios públicos son legibles sin auth | Registrar CPT con `publicly_queryable: false` |
| **Privilege escalation** | Un token robado = acceso de ese usuario | Usar roles con mínimos permisos, tokens corta vida |
| **CSRF** | Cross-site forgery sin validación nonce | Validar `X-WP-Nonce` en PUT/DELETE |
| **Injection** | SQL/PHP si no sanitiza entrada | Validar y escapar en hooks de REST |
| **Broken auth** | Tokens en URLs, almacenamiento inseguro | Bearer tokens solo en headers, HTTPS siempre |

#### **Permisos (capabilities) controlables por endpoint:**
```php
// En register_post_type() o register_rest_field()
'show_in_rest' => true,
'rest_base' => 'custom',

// En rest_*_collection_params o rest_prepare_*
'permission_callback' => function() {
    return current_user_can('edit_posts');
}
```

#### **Cómo lo aprovecha Claude Code:**
- Usar Application Passwords para autenticación de agentes
- Crear roles custom con mínimos permisos (e.g., "Auditor": solo lectura)
- Rotar tokens regularmente
- Loguear todas las acciones del agente para auditoría

---

## 3. Patrones de integración con Claude Code

### 3.1 MCP Server como puente

El patrón recomendado es crear o usar un **MCP Server** que exponga los endpoints de WordPress REST API como herramientas para Claude Code.

#### **Arquitectura:**
```
┌─────────────────────────────────────────────────────────┐
│  Claude Code (agente)                                   │
│  - Razonamiento, decisiones                             │
│  - Llama herramientas via MCP                           │
└────────────────┬────────────────────────────────────────┘
                 │ (MCP protocol: HTTP/stdio)
┌────────────────▼────────────────────────────────────────┐
│  MCP Server (intermediario)                             │
│  - Herramientas tipadas (schémas JSON)                  │
│  - Autenticación/tokens                                 │
│  - Validación de permisos                               │
│  - Logging de acciones                                  │
└────────────────┬────────────────────────────────────────┘
                 │ (HTTP REST)
┌────────────────▼────────────────────────────────────────┐
│  WordPress REST API                                     │
│  - Datos y operaciones reales                           │
│  - Validación de WordPress                              │
│  - Auditoría de WordPress                               │
└─────────────────────────────────────────────────────────┘
```

#### **Configuración en Claude Code:**
```bash
# Conectar MCP Server HTTP remoto
claude mcp add --transport http wordpress \
  https://mcp.tuservidor.com/wordpress \
  --header "Authorization: Bearer MCP_TOKEN"

# O para servidor local (staging/desarrollo)
claude mcp add --transport stdio wordpress \
  node /ruta/a/mcp-wordpress-server.js \
  --env WORDPRESS_URL="http://localhost:8000" \
  --env WORDPRESS_USER="bot" \
  --env WORDPRESS_PASSWORD="app_pass"
```

#### **Archivo `.mcp.json` (proyecto):**
```json
{
  "mcpServers": {
    "wordpress": {
      "command": "node",
      "args": ["mcp-server.js"],
      "env": {
        "WORDPRESS_URL": "https://example.com",
        "WP_USER": "api_bot",
        "WP_AUTH_METHOD": "application_password",
        "WP_TOKEN": "${WP_APP_PASSWORD}",
        "RATE_LIMIT": "10",
        "RATE_WINDOW": "60"
      }
    }
  }
}
```

### 3.2 Herramientas típicas en el MCP Server

Un MCP Server WordPress ofrecería tools como:

```python
# Pseudocódigo / conceptual

tools = [
    {
        "name": "wp_get_posts",
        "description": "Listar posts con filtros",
        "inputSchema": {
            "type": "object",
            "properties": {
                "search": {"type": "string", "description": "Término de búsqueda"},
                "status": {"type": "string", "enum": ["draft", "publish", "pending"]},
                "author_id": {"type": "integer"},
                "per_page": {"type": "integer", "default": 10}
            }
        }
    },
    {
        "name": "wp_create_post",
        "description": "Crear un post",
        "inputSchema": {
            "type": "object",
            "required": ["title", "content"],
            "properties": {
                "title": {"type": "string"},
                "content": {"type": "string"},
                "status": {"type": "string", "default": "draft"},
                "categories": {"type": "array", "items": {"type": "integer"}}
            }
        }
    },
    {
        "name": "wp_update_post",
        "description": "Actualizar un post",
        "inputSchema": { /* similar */ }
    },
    {
        "name": "wp_delete_post",
        "description": "Eliminar un post",
        "inputSchema": {
            "type": "object",
            "required": ["post_id"],
            "properties": { "post_id": {"type": "integer"} }
        }
    },
    {
        "name": "wp_get_media",
        "description": "Listar archivos",
        "inputSchema": { /* ... */ }
    },
    {
        "name": "wp_upload_media",
        "description": "Subir archivo",
        "inputSchema": {
            "type": "object",
            "required": ["file_url", "title"],
            "properties": {
                "file_url": {"type": "string"},
                "title": {"type": "string"},
                "alt_text": {"type": "string"}
            }
        }
    },
    {
        "name": "wp_get_users",
        "description": "Listar usuarios",
        "inputSchema": { /* ... */ }
    },
    {
        "name": "wp_audit_security",
        "description": "Revisar configuración de seguridad",
        "inputSchema": {
            "type": "object",
            "properties": {
                "check_https": {"type": "boolean"},
                "check_perms": {"type": "boolean"},
                "check_updates": {"type": "boolean"}
            }
        }
    }
]
```

### 3.3 Patrones de acceso: lectura vs escritura

#### **Modo lectura (auditoría, análisis)**
- Solo GET requests
- No requiere nonce, Application Passwords es suficiente
- Seguro de usar en agentes sin validación humana
- Ejemplo: "Analizar todos los posts para detectar contenido sin SEO"

#### **Modo lectura + escritura (modificación)**
- GET + POST + PUT + DELETE
- Requiere validación adicional:
  1. **Staging environment obligatorio**: nunca tocar producción sin pruebas
  2. **Validación de cambios**: Claude Code propone, humano aprueba
  3. **Dry-run**: Mostrar qué cambiaría sin ejecutar
  4. **Rollback automático**: Revertir si algo falla

#### **Patrón recomendado para escritura:**
```
1. Agente lee estado actual
2. Agente propone cambios (JSON con diff)
3. Sistema notifica a humano: "¿Proceder? Resumen: [cambios]"
4. Si aprobado: ejecución
5. Log completo: qué, quién, cuándo, antes/después
6. Si error: rollback automático a versión anterior
```

### 3.4 Staging vs Producción

#### **Flujo recomendado:**
```
┌──────────────────────────────────────────────────────┐
│ Agente en Claude Code                               │
│ (conexión a STAGING)                                 │
│ ↓                                                    │
│ Ejecuta cambios, registra resultados                │
│ ↓                                                    │
│ Humano revisa logs y cambios propuestos             │
│ ↓                                                    │
│ Si OK: Agente migra cambios a PRODUCCIÓN            │
│ (validación segura, git push + deploy)              │
└──────────────────────────────────────────────────────┘
```

**En `.mcp.json` o configuración:**
```json
{
  "environments": {
    "staging": {
      "url": "https://staging.example.com",
      "user": "api_bot_staging",
      "allow_write": true,
      "sync_from_production": "daily"
    },
    "production": {
      "url": "https://example.com",
      "user": "api_bot_prod",
      "allow_write": true,
      "requires_human_approval": true,
      "changes_logged": true
    }
  }
}
```

### 3.5 Ventajas y riesgos de cada patrón

| Patrón | Ventaja | Riesgo |
|--------|---------|--------|
| **Lectura solo** | Ningún riesgo de datos; agentes independientes | Limitado a análisis/auditoría |
| **Escritura sin aprobación** | Automatización completa y velocidad | Cambios irreversibles sin control humano |
| **Escritura con aprobación** | Control humano + velocidad + seguridad | Requiere infraestructura de aprobación |
| **Staging → Producción** | Prueba segura antes de ir en vivo | Complejidad operacional, sync delays |
| **WP-CLI local (dev)** | Sin latencia, sin HTTPS requerido | Solo desarrollo, no producción |
| **MCP remoto (cloud)** | Acceso desde cualquier lugar, auditable | Latencia, dependencia de conectividad |

---

## 4. Casos de uso concretos

### 4.1 Auditoría de seguridad asistida por IA

**Objetivo**: Identificar vulnerabilidades de configuración, permisos débiles, plugins sin actualizar.

#### **Flujo end-to-end:**

```
Paso 1: Agente lista configuración de seguridad
├─ GET /wp-json/wp/v2/settings (verificar SSL, etc.)
├─ GET /wp-json/wp/v2/users (revisar roles)
├─ WP-CLI: wp plugin list --update=available (plugins sin parchear)
└─ Analiza resultados

Paso 2: Agente genera reporte
├─ Identifica usuarios con roles privilegiados innecesarios
├─ Lista plugins con vulnerabilidades conocidas
├─ Detecta permisos de archivos débiles (via WP-CLI)
├─ Sugiere roles custom con mínimos permisos
└─ Propone cambios específicos

Paso 3: Humano revisa y aprueba
├─ Lee reporte y recomendaciones
├─ Aprueba cambios selectivos
└─ Agente ejecuta en staging primero

Paso 4: Cambios aplicados
├─ Crear rol "API Read-Only" con capacidades específicas
├─ Reasignar usuarios a roles menos privilegiados
├─ Deshabilitar XML-RPC si no se usa
├─ Aumentar Application Password complexity
```

#### **Ejemplo de herramienta:**
```python
def audit_security():
    checks = {
        "https_enabled": check_https(),
        "plugins_outdated": get_outdated_plugins(),
        "users_with_high_privilege": find_privileged_users(),
        "disabled_endpoints": check_rest_disabled_endpoints(),
        "nonce_validation": verify_nonce_implementation(),
        "rate_limiting": check_rate_limiting_config()
    }
    
    findings = analyze(checks)
    report = generate_markdown_report(findings)
    
    # Proponer cambios
    changes = [
        {
            "action": "update_plugin",
            "plugin": "jetpack",
            "from": "12.0",
            "to": "12.5"
        },
        {
            "action": "create_user_role",
            "role_name": "api_read_only",
            "capabilities": ["read", "list_users", "read_posts"]
        }
    ]
    
    return {
        "report": report,
        "proposed_changes": changes,
        "risk_score": 6.2
    }
```

---

### 4.2 Refactor masivo de contenido (SEO, traducciones, reestructuración)

**Objetivo**: Cambiar estructura de posts, mejorar SEO, traducir a otros idiomas o cambiar formato de contenido.

#### **Caso: Refactor de blogs de Markdown a bloques Gutenberg**

```
Paso 1: Auditoría de contenido actual
├─ GET /wp-json/wp/v2/posts?per_page=100&status=publish
├─ Analizar formato actual de cada post
├─ Identificar posts con Markdown, HTML plano, mezcla

Paso 2: Generación de nuevas versiones
├─ Para cada post:
│   ├─ Leer contenido actual
│   ├─ Convertir a bloques Gutenberg
│   ├─ Mejorar estructura (headings, párrafos, listas)
│   └─ Crear versión propuesta en JSON
└─ Guardar versiones en staging

Paso 3: Validación automática
├─ Verificar bloques válidos (wp block-types)
├─ Validar que no hay pérdida de contenido
├─ Revisar rendering en staging
└─ Comparar antes/después

Paso 4: Revisión humana
├─ Muestra de 5 posts convertidos para revisar
├─ Feedback → Agente ajusta conversion logic
└─ Aprobación para proceder

Paso 5: Migración por lotes
├─ Actualizar 20 posts por lote
├─ Esperar 5 segundos entre lotes (rate limit)
├─ Log de cambios: puesto_id, cambios, timestamp
└─ Si error: rollback automático y notificación
```

#### **Herramienta de conversión:**
```python
def convert_post_to_blocks(post_id):
    post = get_post(post_id)
    
    # Parsear content actual
    if is_markdown(post['content']):
        blocks = markdown_to_blocks(post['content'])
    elif is_raw_html(post['content']):
        blocks = html_to_blocks(post['content'])
    else:
        blocks = parse_existing_blocks(post['content'])
    
    # Mejorar estructura
    enhanced_blocks = enhance_structure(blocks)
    
    # Generar content JSON de Gutenberg
    content_json = blocks_to_wp_content(enhanced_blocks)
    
    # Validar
    validation = validate_blocks(enhanced_blocks)
    
    return {
        "original": post['content'],
        "converted": content_json,
        "changes_summary": {
            "blocks_count": len(enhanced_blocks),
            "formatting_improved": True,
            "content_preserved": validation['all_content_preserved']
        },
        "validation": validation
    }
```

#### **Endpoints utilizados:**
- `GET /wp-json/wp/v2/posts` - Listar todos
- `GET /wp-json/wp/v2/posts/{id}` - Leer contenido actual
- `PUT /wp-json/wp/v2/posts/{id}` - Actualizar con nuevos bloques
- `GET /wp-json/wp/v2/block-types` - Validar tipos de bloques disponibles

---

### 4.3 Gestión de Full Site Editing (FSE) a través de API

**Objetivo**: Automatizar cambios de diseño, sincronizar plantillas entre sitios, actualizar temas.

#### **Caso: Cambiar paleta de colores global en FSE**

```
Paso 1: Obtener configuración de theme.json
├─ Leer theme.json actual (estructura JSON)
├─ Extraer paleta de colores, tipografía, espaciado

Paso 2: Proponer cambios
├─ Agente sugiere nueva paleta (basada en marca)
├─ Simula visualización con nuevos colores
├─ Calcula contraste (accesibilidad)

Paso 3: Actualizar plantillas que usan los colores antiguos
├─ GET /wp-json/wp/v2/templates
├─ Para cada template:
│   ├─ Buscar referencias a colores antiguos
│   ├─ Reemplazar en JSON de bloques
│   ├─ Validar que render sea correcto
│   └─ PUT /wp-json/wp/v2/templates/{id}

Paso 4: Verification
├─ Captura screenshot de homepage en staging
├─ Humano revisa cambios visuales
└─ Si OK, migrar a producción
```

#### **Herramienta:**
```python
def update_fse_color_scheme(old_colors, new_colors):
    # Obtener tema.json
    theme_json = fetch_theme_json()
    
    # Actualizar paleta
    updated_theme = replace_colors(theme_json, old_colors, new_colors)
    
    # Buscar plantillas afectadas
    templates = get_templates()
    
    updates = []
    for template in templates:
        # Analizar bloques
        blocks = parse_template_blocks(template['content'])
        
        # Buscar referencias a colores
        color_refs = find_color_references(blocks, old_colors)
        
        if color_refs:
            # Reemplazar
            updated_content = update_block_colors(
                template['content'],
                old_colors,
                new_colors
            )
            
            updates.append({
                "template_id": template['id'],
                "template_slug": template['slug'],
                "changes": color_refs,
                "new_content": updated_content
            })
    
    # Generar reporte
    return {
        "theme_updates": updated_theme,
        "template_updates": updates,
        "affected_template_count": len(updates)
    }
```

#### **Endpoints:**
- `GET /wp-json/wp/v2/templates` - Listar plantillas
- `GET /wp-json/wp/v2/templates/{id}` - Leer plantilla
- `PUT /wp-json/wp/v2/templates/{id}` - Actualizar plantilla
- `GET /wp-json/wp/v2/template-parts` - Partes reutilizables

---

### 4.4 Generación asistida de contenido con revisión humana

**Objetivo**: Claude Code genera borradores de posts basados en datos/plantillas, humano aprueba antes de publicar.

#### **Caso: Generar posts de producto desde CSV / API externa**

```
Paso 1: Obtener datos de fuente externa
├─ Leer CSV de productos / API de e-commerce
├─ Extraer: nombre, descripción, precio, categoría

Paso 2: Generar borrador de post
├─ Claude Code llama al modelo de lenguaje
├─ "Crea post de blog promocionando este producto"
├─ Genera contenido, SEO keywords, featured image description
├─ Crea post como DRAFT (no publicado)

Paso 3: POST /wp-json/wp/v2/posts
├─ Crear post con status="draft"
├─ Asignar categoría, tags, featured image
├─ Guardar metadatos (product_id, source_url)

Paso 4: Notificación a editor
├─ Email: "Nuevo borrador generado: [título]"
├─ Link a revisar en wp-admin
├─ Historial de cambios

Paso 5: Humano revisa y publica
├─ Editor revisa contenido generado
├─ Ajusta si es necesario
├─ Publica manualmente (o aprueba auto-publish)

Paso 6: Logging
├─ Registrar: qué contenido, quién lo generó,
│             quién aprobó, cuándo publicado
```

#### **Pseudocódigo MCP tool:**
```python
def generate_product_post(product_data):
    """
    Generar borrador de post para un producto
    """
    # Usar modelo LLM
    prompt = f"""
    Crea un post de blog atractivo y profesional que promocione este producto:
    - Nombre: {product_data['name']}
    - Descripción: {product_data['description']}
    - Precio: {product_data['price']}
    - Categoría: {product_data['category']}
    
    Incluye:
    - Título SEO-friendly
    - Párrafos detallados
    - Lista de beneficios
    - Call-to-action
    - Meta descripción
    - Keywords
    """
    
    generated = claude_model.generate(prompt)
    
    # Crear post via REST API
    post_data = {
        "title": generated['title'],
        "content": generated['content'],
        "status": "draft",
        "categories": [map_category_to_wp_id(product_data['category'])],
        "meta": {
            "product_id": product_data['id'],
            "seo_keywords": generated['keywords'],
            "meta_description": generated['meta_description'],
            "ai_generated": True,
            "generated_at": datetime.now().isoformat()
        }
    }
    
    # PUT /wp-json/wp/v2/posts
    response = wordpress_api.create_post(post_data)
    
    return {
        "post_id": response['id'],
        "title": generated['title'],
        "status": "draft",
        "editor_url": f"https://example.com/wp-admin/post.php?post={response['id']}&action=edit",
        "generated_content_preview": generated['content'][:500] + "..."
    }
```

---

### 4.5 Mantenimiento técnico asistido

**Objetivo**: Detectar y corregir problemas técnicos: plugins obsoletos, opciones redundantes, media huérfana.

#### **Caso: Limpieza de medios no usados**

```
Paso 1: Auditoría de archivos
├─ GET /wp-json/wp/v2/media?per_page=100
├─ Para cada archivo:
│   ├─ Obtener ID y URL
│   ├─ Buscar referencias en posts (GET /wp-json/wp/v2/posts)
│   └─ Marcar si huérfano (no usado)

Paso 2: Análisis de impacto
├─ Calcular espacio a liberar
├─ Verificar que no hay referencias ocultas (meta, campos custom)
├─ Generar lista de archivos para eliminar

Paso 3: Revisión humana
├─ Mostrar lista de huérfanos con previsualizaciones
├─ Opción de salvaguarda: mover a carpeta de backup en lugar de eliminar

Paso 4: Ejecución
├─ DELETE /wp-json/wp/v2/media/{id}
├─ Registrar cada eliminación
└─ Notificar resultado

Paso 5: Reporte final
├─ Archivos eliminados: 47
├─ Espacio liberado: 2.3 GB
├─ Tiempo de ejecución: 3min
```

#### **Herramienta:**
```python
def cleanup_orphaned_media():
    # Obtener todos los archivos
    media_items = get_all_media()
    
    orphaned = []
    
    for media in media_items:
        # Buscar referencias en posts
        posts_with_ref = search_posts_with_media(media['id'])
        
        # Buscar en metadatos
        meta_refs = search_meta_with_media(media['id'])
        
        if not posts_with_ref and not meta_refs:
            orphaned.append({
                "id": media['id'],
                "title": media['title'],
                "url": media['source_url'],
                "size_mb": media['media_details']['filesize'] / (1024*1024),
                "uploaded_date": media['date']
            })
    
    # Calcular impacto
    total_size = sum(m['size_mb'] for m in orphaned)
    
    return {
        "orphaned_count": len(orphaned),
        "space_to_free_mb": total_size,
        "files": orphaned,
        "recommendations": [
            f"Eliminar {len(orphaned)} archivos sin usar",
            f"Liberar {total_size:.1f} MB de almacenamiento"
        ]
    }
```

---

## 5. Ejemplos esquemáticos de implementación

### 5.1 Servidor MCP básico (Node.js)

**Estructura de proyecto:**
```
mcp-wordpress/
├── package.json
├── .env.example
├── src/
│   ├── server.js              # Servidor MCP principal
│   ├── tools/
│   │   ├── posts.js           # Herramientas para posts
│   │   ├── media.js           # Herramientas para media
│   │   ├── users.js           # Herramientas para usuarios
│   │   └── audit.js           # Herramientas de auditoría
│   └── utils/
│       ├── wordpress-api.js   # Cliente REST API
│       └── auth.js            # Gestión de autenticación
└── .mcp.json                  # Configuración MCP
```

**server.js (esqueleto):**
```javascript
import Anthropic from "@anthropic-ai/sdk";

const client = new Anthropic({
  apiKey: process.env.ANTHROPIC_API_KEY,
});

// Definir herramientas disponibles
const tools = [
  {
    name: "wp_get_posts",
    description: "Obtener lista de posts con filtros",
    input_schema: {
      type: "object",
      properties: {
        search: { type: "string" },
        status: { type: "string", enum: ["draft", "publish", "pending"] },
        per_page: { type: "integer", default: 10 },
      },
    },
  },
  {
    name: "wp_create_post",
    description: "Crear un nuevo post",
    input_schema: {
      type: "object",
      required: ["title", "content"],
      properties: {
        title: { type: "string" },
        content: { type: "string" },
        status: { type: "string", default: "draft" },
        categories: { type: "array", items: { type: "integer" } },
      },
    },
  },
  // ... más herramientas
];

// Loop principal del agente
async function runAgent(task) {
  const messages = [
    {
      role: "user",
      content: task,
    },
  ];

  let response = await client.messages.create({
    model: "claude-opus-4-1", // o claude-3-5-sonnet
    max_tokens: 4096,
    tools: tools,
    messages: messages,
  });

  // Loop agentic
  while (response.stop_reason === "tool_use") {
    const toolUseBlock = response.content.find(
      (block) => block.type === "tool_use"
    );

    if (!toolUseBlock) break;

    // Ejecutar herramienta
    const toolResult = await executeTool(
      toolUseBlock.name,
      toolUseBlock.input
    );

    // Continuar conversación
    messages.push({
      role: "assistant",
      content: response.content,
    });

    messages.push({
      role: "user",
      content: [
        {
          type: "tool_result",
          tool_use_id: toolUseBlock.id,
          content: JSON.stringify(toolResult),
        },
      ],
    });

    response = await client.messages.create({
      model: "claude-opus-4-1",
      max_tokens: 4096,
      tools: tools,
      messages: messages,
    });
  }

  // Extraer respuesta final
  const finalText = response.content
    .filter((block) => block.type === "text")
    .map((block) => block.text)
    .join("\n");

  return finalText;
}

async function executeTool(toolName, input) {
  switch (toolName) {
    case "wp_get_posts":
      return await getPostsWithFilters(input);
    case "wp_create_post":
      return await createPost(input);
    // ... más casos
    default:
      return { error: `Unknown tool: ${toolName}` };
  }
}

// Ejecutar tarea
const task = "Auditar posts sin SEO keywords en los últimos 3 meses";
runAgent(task).then((result) => {
  console.log("Resultado final:\n", result);
});
```

**tools/posts.js (ejemplo):**
```javascript
import fetch from "node-fetch";

async function getPostsWithFilters({
  search,
  status = "publish",
  per_page = 10,
}) {
  const params = new URLSearchParams({
    search: search || "",
    status: status,
    per_page: per_page,
  });

  const response = await fetch(
    `${process.env.WORDPRESS_URL}/wp-json/wp/v2/posts?${params}`,
    {
      headers: {
        Authorization: `Basic ${Buffer.from(
          `${process.env.WP_USER}:${process.env.WP_PASSWORD}`
        ).toString("base64")}`,
      },
    }
  );

  if (!response.ok) {
    throw new Error(`WordPress API error: ${response.statusText}`);
  }

  return await response.json();
}

async function createPost({ title, content, status = "draft", categories }) {
  const payload = {
    title: title,
    content: content,
    status: status,
    categories: categories || [],
  };

  const response = await fetch(
    `${process.env.WORDPRESS_URL}/wp-json/wp/v2/posts`,
    {
      method: "POST",
      headers: {
        Authorization: `Basic ${Buffer.from(
          `${process.env.WP_USER}:${process.env.WP_PASSWORD}`
        ).toString("base64")}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    }
  );

  if (!response.ok) {
    throw new Error(`Create post failed: ${response.statusText}`);
  }

  return await response.json();
}

export { getPostsWithFilters, createPost };
```

---

### 5.2 Configuración de MCP Server en Claude Code

**`.mcp.json` (proyecto):**
```json
{
  "mcpServers": {
    "wordpress": {
      "command": "node",
      "args": ["src/server.js"],
      "env": {
        "WORDPRESS_URL": "https://staging.example.com",
        "WP_USER": "api_bot",
        "WP_PASSWORD": "${WP_APP_PASSWORD}",
        "ANTHROPIC_API_KEY": "${ANTHROPIC_API_KEY}",
        "ENVIRONMENT": "staging"
      }
    }
  }
}
```

**Instalación y validación:**
```bash
# Verificar que el servidor está registrado
/mcp

# Debería mostrar:
# wordpress - Ready
# Available tools:
# - wp_get_posts
# - wp_create_post
# - ...
```

---

## 6. Riesgos, límites y buenas prácticas

### 6.1 Riesgos de seguridad específicos

| Riesgo | Descripción | Consecuencia |
|--------|-------------|--------------|
| **Token robado** | Si el token Bearer está en logs/histórico | Acceso no autorizado, cambios maliciosos |
| **Inyección vía input** | LLM envía contenido malicioso (SQL, scripts) | Ejecución de código, XSS, SQL injection |
| **Escalada de privilegios** | Un usuario low-privilege obtiene rol admin | Control total del sitio |
| **Iteración descontrolada** | Agente crea bucle infinito de cambios | Downtime, corrupción de datos |
| **Acceso a datos sensibles** | Lectura de posts privados, usuario PII | Filtración de información confidencial |
| **Rate limiting DoS** | Agente hace 1000 requests/segundo | Blacklisting de IP, degradación de servicio |
| **Cambios no validados** | Agente modifica sin revisar impacto | Corrupción de contenido, SEO dañado |

### 6.2 Validación de entrada en hooks WordPress

**En functions.php (nivel de servidor):**
```php
add_filter('rest_pre_insert_post', function($prepared_post) {
    // Validar que el contenido no tiene código ejecutable
    if (preg_match('/<?php|<script|eval\(|exec\(/i', $prepared_post->post_content)) {
        return new WP_Error(
            'dangerous_content',
            'El contenido contiene código potencialmente peligroso.'
        );
    }
    
    // Sanitizar HTML
    $prepared_post->post_content = wp_kses_post($prepared_post->post_content);
    
    return $prepared_post;
}, 10, 1);
```

### 6.3 Entornos y staging

**Checklist:**
- [ ] Sitio de staging en subdominio privado (staging.example.com)
- [ ] Staging con `WP_DEBUG = true`, logging activo
- [ ] Staging con robots.txt `Disallow: /` y meta noindex
- [ ] Credenciales de staging diferentes a producción
- [ ] Base de datos de staging actualizada diariamente desde producción
- [ ] Backups automáticos antes de cambios de agente
- [ ] Monitoreo de error logs durante ejecución
- [ ] Rollback manual disponible en <5 minutos

**Script de sincronización (staging ← producción):**
```bash
#!/bin/bash
# sync-staging.sh

# Backup staging actual (antes de sobreescribir)
wp db export /backups/staging-$(date +%Y%m%d-%H%M%S).sql

# Sync database (solo tablas seguras, no transacciones)
wp db export /tmp/prod.sql --ssh=prodserver
wp db import /tmp/prod.sql --skip-warnings

# Sync archivos (media, temas, plugins)
rsync -av prodserver:/var/www/html/wp-content/uploads \
           ./wp-content/uploads

# Verificar integridad
wp db check
wp site health get
```

### 6.4 Logging y auditoría

**Tabla custom en WordPress para auditar agente:**
```sql
CREATE TABLE wp_ai_agent_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    agent_name VARCHAR(100),
    action VARCHAR(100), -- 'create_post', 'delete_post', 'audit', etc.
    resource_type VARCHAR(50), -- 'post', 'user', 'media', etc.
    resource_id INT,
    changes_before JSON,
    changes_after JSON,
    status VARCHAR(20), -- 'success', 'failed', 'pending_approval'
    human_approval BOOLEAN DEFAULT FALSE,
    approved_by INT,
    error_message TEXT,
    INDEX idx_timestamp (timestamp),
    INDEX idx_action (action)
);
```

**Registrar en cada acción:**
```php
function log_ai_agent_action($agent, $action, $resource, $before, $after, $status) {
    global $wpdb;
    
    $wpdb->insert('wp_ai_agent_log', [
        'agent_name' => sanitize_text_field($agent),
        'action' => sanitize_text_field($action),
        'resource_type' => sanitize_text_field($resource['type']),
        'resource_id' => intval($resource['id'] ?? 0),
        'changes_before' => wp_json_encode($before),
        'changes_after' => wp_json_encode($after),
        'status' => sanitize_text_field($status)
    ]);
}
```

**Dashboard para revisar actividad:**
```bash
wp ai-log list --since=24h --action=delete
wp ai-log show {log_id}
wp ai-log export --format=csv > agent_activity.csv
```

### 6.5 Buenas prácticas

#### **Antes de automatizar:**
- [ ] ¿Tenemos staging idéntico a producción?
- [ ] ¿Hay backup automático?
- [ ] ¿El agente tiene permiso mínimo necesario?
- [ ] ¿Hay límite de cambios (rate limit, max items)?
- [ ] ¿Hay validación de salida (schema, reglas)?
- [ ] ¿Hay logging completo?
- [ ] ¿Hay aprobación humana?

#### **Durante ejecución:**
- [ ] Monitorear en tiempo real (logs, alertas)
- [ ] Detener inmediatamente si comportamiento anómalo
- [ ] No confiar completamente en LLM (validar siempre)
- [ ] Limitar cambios por sesión

#### **Después de cambios:**
- [ ] Verificar visitas de usuarios (sin errores 500)
- [ ] Revisar logs de errores
- [ ] Comparar antes/después (snapshots)
- [ ] Notificar a stakeholders de cambios mayores

### 6.6 Rate limiting recomendado

**En MCP Server:**
```python
# Configurar límites
RATE_LIMITS = {
    "wp_get_posts": {"calls": 100, "window_seconds": 60},
    "wp_create_post": {"calls": 10, "window_seconds": 60},
    "wp_delete_post": {"calls": 5, "window_seconds": 60},
    "wp_audit_security": {"calls": 2, "window_seconds": 60}
}

def apply_rate_limit(tool_name, agent_id):
    limit = RATE_LIMITS.get(tool_name)
    if not limit:
        return  # Sin límite
    
    key = f"ratelimit:{agent_id}:{tool_name}"
    current_count = redis.incr(key)
    
    if current_count == 1:
        redis.expire(key, limit['window_seconds'])
    
    if current_count > limit['calls']:
        raise RateLimitExceeded(
            f"Limit {limit['calls']} calls per {limit['window_seconds']}s exceeded"
        )
```

### 6.7 Políticas de MCP organizacionales

**managed-mcp.json (empresa):**
```json
{
  "allowedMcpServers": [
    {
      "serverUrl": "https://mcp-internal.company.com/*",
      "requiresApproval": false
    },
    {
      "serverUrl": "https://mcp-wordpress.company.com/*",
      "requiresApproval": true,
      "approverRole": "security-team"
    }
  ],
  "deniedMcpServers": [
    {
      "serverName": "execute_arbitrary_code"
    }
  ]
}
```

---

## 7. Ejemplos de prompts para Claude Code

### 7.1 Auditoría de seguridad

```
Actúa como auditor de seguridad de WordPress. 

1. Usar herramientas MCP para:
   - Listar todos los usuarios y sus roles
   - Obtener configuración de seguridad del sitio
   - Verificar estado de plugins (actualizaciones pendientes)

2. Analizar:
   - ¿Hay usuarios con rol 'administrator' que no debería?
   - ¿Hay plugins sin actualizar hace >3 meses?
   - ¿HTTPS está habilitado?

3. Generar reporte con:
   - Hallazgos de seguridad (Critical, High, Medium)
   - Acciones recomendadas
   - Cambios propuestos (código, configuración)

4. Para cada acción: Mostrar exactamente qué cambiaría, antes/después.

5. NO ejecutar cambios sin mi aprobación explícita.
```

### 7.2 Generación de contenido asistida

```
Eres especialista en generación de contenido para blogs WordPress.

Tarea: Generar 3 posts de blog sobre "WordPress REST API Security"

Para cada post:
1. Crear como borrador (status=draft)
2. Incluir:
   - Título SEO-friendly
   - Contenido en bloques Gutenberg
   - Meta descripción (SEO)
   - 3-5 tags relevantes
   - Featured image (usar Unsplash API)
3. Guardar metadatos: 
   - ai_generated: true
   - topic_cluster: "api-security"

Mostrar antes de crear:
- Resumen de contenido
- Keywords identificadas
- Puntuación SEO (estimada)

Si me das feedback, ajusta y recrea.
```

### 7.3 Refactor de contenido

```
Objetivo: Actualizar todos los posts de la categoría "Tutoriales"
para usar bloques Gutenberg nativos (remove custom HTML).

Proceso:
1. GET todos los posts de category=tutorials
2. Para cada post:
   a. Analizar estructura HTML actual
   b. Convertir a bloques Gutenberg (heading, paragraph, code, list, etc.)
   c. Validar que no se pierda contenido
   d. Guardar en staging como draft
3. Mostrar sample (3 posts antes/después)
4. Pedir aprobación
5. En staging: usar PUT para actualizar (no deletear/recrear)
6. Si alguien edita un post en wp-admin durante cambios: STOP, esperar
7. Log completo de cambios

Validaciones importantes:
- Código (```...```) → bloque Code de Gutenberg
- Listas numeradas → bloque List
- Headings → bloque Heading (niveles correctos)
- Links → sin romper
```

---

## 8. Limitaciones conocidas y workarounds

| Limitación | Descripción | Workaround |
|------------|-------------|-----------|
| **No hay soporte nativo de meta_query en REST** | Filtrar por custom fields es engorroso | Usar hooks `rest_{post_type}_query` en server |
| **Límite de 100 items por página (defecto)** | Paginar contenido masivo es lento | Aumentar con `?per_page=100` (requiere permiso) |
| **No se pueden modificar datos de usuario masivamente** | Usuario password → requiere endpoint especial | Usar WP-CLI: `wp user update {id} --prompt=user_pass` |
| **Validación de esquema débil en algunos posts** | LLM puede generar JSON inválido | Validar con `wp post parse --format=json` antes de PUT |
| **No hay transacciones nativas** | Si un cambio falla a mitad, no hay rollback automático | Implementar rollback manual, backup ante cada batch |
| **WP-CLI solo funciona en SSH/local** | No accesible desde web | Crear endpoint REST custom que envuelva WP-CLI |
| **Límite de capacidad de modelo para archivos grandes** | Posts con >50KB de contenido HTML son difíciles de procesar | Dividir en trozos, o usar herramientas especializadas |

---

## 9. Resumen y roadmap

### 9.1 Patrones implementables hoy (2025)

1. **Auditoría de seguridad asistida** ✅
   - Leer configuración, detectar riesgos
   - Proponer cambios, humano aprueba

2. **Generación de borradores** ✅
   - LLM crea posts, revisor aprueba
   - Ideal para contenido repetitivo

3. **Análisis y reportes** ✅
   - Posts sin SEO, media huérfana, plugins desactualizados
   - Agente genera reportes, humano actúa

4. **Refactor de contenido** ✅ (con cuidado)
   - En staging primero
   - Validación humana, lotes pequeños

5. **Integración con Abilities API** ✅
   - Nuevas capacidades nativas de WordPress
   - Endpoints `/wp-json/wp-abilities/v1`

### 9.2 Tendencias futuras

- **Más Abilities API**: WordPress seguirá exponiendo capacidades nativas
- **Mejor soporte de bloques**: FSE + MCP = diseño automático
- **Orquestación multi-agente**: Múltiples agentes especializados en paralelo
- **Validación mejorada**: Más hooks para interceptar cambios de agente
- **OpenAI compatibility**: Claude Code, GPT, Gemini bajo mismo protocolo

---

## Referencias

### Documentación oficial
- **WordPress REST API**: https://developer.wordpress.org/rest-api/reference/
- **WP-CLI**: https://wp-cli.org y https://make.wordpress.org/cli/
- **Full Site Editing**: https://developer.wordpress.org/block-editor/how-to-guides/full-site-editing-tutorial/
- **WordPress Abilities API**: https://developer.wordpress.org/apis/wordpress-org/abilities/
- **Claude Code MCP**: https://code.claude.com/docs/en/mcp

### Tutoriales y artículos (2024-2025)
- Bluehost. (2026). How the WordPress REST API Works: Complete Guide. https://www.bluehost.com/blog/wordpress-rest-api/
- WP Plugins Tips. (2024). WordPress REST API Security: Best Practices and Tools. https://wpplugins.tips/wordpress-rest-api-security-best-practices-and-tools/
- Anthropic. (2025). Building agents with the Claude Agent SDK. https://www.anthropic.com/engineering/building-agents-with-the-claude-agent-sdk
- Birchler, P. (2025). WordPress, WP-CLI, and the Model Context Protocol (MCP). https://pascalbirchler.com/wordpress-model-context-protocol-mcp/

### Seguridad y mejores prácticas
- Oddjar. (2025). WordPress REST API Authentication: Complete Security Guide. https://oddjar.com/wordpress-rest-api-authentication-guide-2025/
- GetShield. (2024). Proven Tips Securing Your WordPress REST API. https://getshieldsecurity.com/blog/wordpress-rest-api-security/
- RisingStack. (2025). A Practical Guide to External Safety Layers. https://blog.risingstack.com/llm-safety-layers/

---

**Documento preparado**: Enero 2026
**Estado**: Publicable para investigadores, desarrolladores, equipos de BI
**Licencia**: Creative Commons BY 4.0

---


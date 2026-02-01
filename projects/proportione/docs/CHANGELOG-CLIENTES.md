# Changelog - Página Clientes

## 2026-02-01 - Rediseño Defensa y Seguridad

### Añadido
- Nueva sección "Defensa y Seguridad" con 3 clientes:
  - EINSA (einsa.es) - Colaboración estratégica bajo acuerdo de confidencialidad
  - MTP (mtp.es) - Proyecto reservado en transformación digital
  - Libertia IT (libertia.es) - Iniciativa confidencial en ciberseguridad
- Estilos CSS específicos para sección Defensa (.clientes-defensa)
- Logos subidos: einsa-logo.png, mtp-logo.png, libertia-logo.png

### Modificado
- Contador de sectores: 4 → 5
- Página migrada de clientes.php personalizado a Elementor (página ID 122)

### Eliminado
- Sección testimonial ("Director de Innovación")
- Regla htaccess que redirigía /clientes/ a clientes.php

### Archivos afectados
- elementor-templates/clientes-confian-proportione.json
- wp-content/themes/hello-elementor-child/css/clientes.css
- .htaccess (servidor)
- wp_postmeta._elementor_data (página 122)

// Smoke test para página clientes
const { test, expect } = require('@playwright/test');

test.describe('Página Clientes - Smoke Tests', () => {
  test('página carga correctamente', async ({ page }) => {
    const response = await page.goto('/clientes/');
    expect(response.status()).toBe(200);
  });

  test('título correcto', async ({ page }) => {
    await page.goto('/clientes/');
    await expect(page).toHaveTitle(/Clientes.*Proportione/i);
  });

  test('sección Defensa y Seguridad existe', async ({ page }) => {
    await page.goto('/clientes/');
    // El elemento puede estar fuera del viewport, verificamos que existe en el DOM
    const defensaSection = page.locator('text=Defensa y Seguridad');
    await expect(defensaSection).toHaveCount(1);
    // Scroll para hacer visible y verificar
    await defensaSection.scrollIntoViewIfNeeded();
    await expect(defensaSection).toBeVisible();
  });

  test('clientes Defensa existen', async ({ page }) => {
    await page.goto('/clientes/');
    // Verificar que los elementos existen en el DOM
    await expect(page.locator('text=EINSA')).toHaveCount(1);
    await expect(page.locator('text=MTP').first()).toBeAttached();
    await expect(page.locator('text=Libertia')).toHaveCount(1);
  });

  test('sin sección testimonial', async ({ page }) => {
    await page.goto('/clientes/');
    await expect(page.locator('.clientes-testimonial')).toHaveCount(0);
  });

  test('contador 5 sectores existe', async ({ page }) => {
    await page.goto('/clientes/');
    // Verificar que el contador con valor 5 existe en el DOM
    const counter = page.locator('[data-to-value="5"]');
    await expect(counter).toHaveCount(1);
  });
});

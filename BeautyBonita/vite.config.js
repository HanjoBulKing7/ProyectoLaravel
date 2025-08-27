import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        host: '0.0.0.0',   // 👈 expone Vite a la red (no solo dentro del contenedor)
        port: 5173,        // 👈 fija el puerto (no cambiará a 5174)
        strictPort: true,  // 👈 lanza error si el 5173 ya está ocupado
        hmr: {
            host: 'localhost', // 👈 usa localhost en tu navegador
            port: 5173,
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

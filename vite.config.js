import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            output: {
                // Ensuring assets are in the correct directory without extra subdirectories
                assetFileNames: 'assets/[name]-[hash][extname]',
                chunkFileNames: 'assets/[name]-[hash].js',
                entryFileNames: 'assets/[name]-[hash].js',
            },
            input: {
                // This specifies the input files
                app: 'resources/js/app.js',
            },
            output: {
                // Specify the output file format for the manifest
                format: 'es',
                dir: 'public/build',
                entryFileNames: 'assets/[name]-[hash].js',
                chunkFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash][extname]',
                manualChunks: undefined,
            },
        },
        emptyOutDir: true, // This ensures the directory is cleared before building
    },
});

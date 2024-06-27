import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: 'public/build', // Répertoire de sortie pour le build
        manifest: true, // Génère un fichier de manifeste pour les assets
        assetsDir: 'assets', // Répertoire des assets
        cssCodeSplit: true, // Fractionnement du code CSS
        emptyOutDir: true, // Vide le répertoire de sortie avant la génération
        rollupOptions: {
            output: {
                chunkFileNames: 'assets/js/[name].js', // Noms des fichiers pour les chunks
                entryFileNames: 'assets/js/[name].js', // Noms des fichiers pour les entrées
                assetFileNames: 'assets/[ext]/[name].[ext]', // Noms des fichiers pour les assets
            },
        },
    },
    publicDir: 'resources/assets', // Répertoire public pour les assets
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'], // Entrées pour le build
            refresh: true, // Actualisation automatique lors des modifications
        }),
    ],
});

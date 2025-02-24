import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import VitePluginSvgSpritemap from '@spiriit/vite-plugin-svg-spritemap'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        VitePluginSvgSpritemap('./resources/icons/*.svg', {
            output: {
                filename: 'default.svg'
            },
        }),
    ],
});

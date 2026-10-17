import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import { resolve, dirname } from 'path';
import fs from 'fs';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
  build: {
    outDir: 'css',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        app: './resources/css/app.css',
      },
      output: {
        assetFileNames: 'app.css'
      }
    },
    watch: {
      include: ['resources/**', '**/*.php'],
      exclude: ['css/**', 'js/**', 'node_modules/**', '.git/**'],
    },
  },
  logLevel: 'error', // Reduce terminal output during watch mode
});
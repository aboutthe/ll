# JS/CSS импортированы из проекта id

Сделаны следующие шаги:
1. Объединён package.json (версии из id имеют приоритет).
2. Скопированы конфиги: vite.config.js, tailwind.config.js, postcss.config.js (существующие в ll сохранены как .bak).
3. Скопированы папки resources/js и resources/css (существующие файлы в ll сохранены как .bak).
4. В resources/js/app.js добавлен импорт '../css/app.css' при отсутствии.
5. В resources/css/app.css добавлены директивы Tailwind при отсутствии.

## Как запустить
```bash
npm install
npm run dev
```
Если Vite/Tailwind не стартуют, проверь версии Node и наличие .env.

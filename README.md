# Template Skazy
Joomla Template with SASS, jQuery and Bootstrap

## Requirements
- Node.js (see https://nodejs.org)
- SASS (see http://sass-lang.com/install)

## Technologies - languages
- HTML
- CSS
- SASS
- BEM
- ITCSS
- Bootstrap 4
- JavaScript
- jQuery
- node.js

## Install
```npm i``` install Node modules before use them  

## Use
```npm start``` run watcher for SCSS and JS with live reload  
```npm run lint``` check HTML, SCSS and JS files and give advise to code properly  
```npm run build``` generate dist folder for prod (contains CSS, JS, img)  
```npm run scss:clean``` clean and reorder SCSS files /!\ check before commit can be destructive /!\  

## Tasks list
- [x] Use SASS
- [x] Use BrowserSync to live reload
- [x] Include Bootstrap & jQuery
- [x] Use BEMIT (ITCSS)
- [x] Use imagemin to optimize images
- [x] Use svg-sprite to regroup SVG
- [x] Use csscomb to clean SCSS
- [ ] Fix csscomb on comments, @include and $p: &;
- [ ] Replace Windows variables with cross-platform variables

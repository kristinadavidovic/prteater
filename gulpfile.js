const { src, dest, watch } = require('gulp')
const sass = require('gulp-sass')
const minifyCSS = require('gulp-csso')
const babel = require('gulp-babel')
const concat = require('gulp-concat')

function css() {
  return src('./sass/*.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(minifyCSS())
    .pipe(
      dest('./'),
      { sourcemaps: true }
    )
}

function js() {
  return src('./js/*.js', { sourcemaps: true })
    .pipe(
      babel({
        presets: ['@babel/env'],
      })
    )
    .pipe(concat('build.min.js'))
    .pipe(dest('./js/min', { sourcemaps: true }))
}

function watchMe() {
  watch('./sass/**/*.scss', css)
}

exports.css = css
exports.js = js
exports.default = watchMe

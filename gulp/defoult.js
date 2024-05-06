const gulp = require('gulp');
const fileinclude = require('gulp-file-include');
const sass = require('gulp-sass')(require('sass'));
const sassGlob = require('gulp-sass-glob');
const server = require('gulp-server-livereload');
const clean = require('gulp-clean');
const fs = require('fs');
const sourcemaps = require('gulp-sourcemaps');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const webpack = require('webpack-stream');
const babel = require('gulp-babel');
const imagemin = require('gulp-imagemin');
const changed = require('gulp-changed');
const replace = require('gulp-replace');
const fonter = require('gulp-fonter');
const ttf2woff2 = require('gulp-ttf2woff2');
const php = require('gulp-connect-php');



gulp.task('clean:dev', function(done){
    if (fs.existsSync('./build/')){
        return gulp.src('./build/', {read: false})
            .pipe(clean({force: true}));
    }
    done();
});

const includeFileSetting = {
    prefix: '@@',
    basepatch: '@file'
};

const plumberConfig = (title) => {
    return {
         errorHandler: notify.onError({
        title: title,
        message: "Error: <%= error.message %>",
        sound: false
         }),
    }
};

gulp.task('html:dev', function(){
    return gulp.src(['./src/html/**/*.html', '!./src/html/blocks/*.html'])
        .pipe(changed('./build',{hasChanged: changed.compareContents}))
        .pipe(plumber(plumberConfig('HTML')))
        .pipe(fileinclude(includeFileSetting))
        .pipe(
			replace(
				/(?<=src=|href=|srcset=)(['"])(\.(\.)?\/)*(img|images|fonts|css|scss|sass|js|files|audio|video)(\/[^\/'"]+(\/))?([^'"]*)\1/gi,
				'$1./$4$5$7$1'
			)
        )
        .pipe(gulp.dest('./build'))
});

gulp.task('sass:dev', function(){
    return gulp.src('./src/scss/*.scss')
        .pipe(changed('./build/css/'))
        .pipe(plumber(plumberConfig('SCSS')))
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(
			replace(
				/(['"]?)(\.\.\/)+(img|images|fonts|css|scss|sass|js|files|audio|video)(\/[^\/'"]+(\/))?([^'"]*)\1/gi,
				'$1$2$3$4$6$1'
			)
		)
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./build/css/'))
});

gulp.task('images:dev', function(){
    return gulp.src('./src/img/**/*' , { encoding: false })
        .pipe(changed('./build/img/'))
        .pipe(imagemin())
        .pipe(gulp.dest('./build/img/'));
});

gulp.task('fonts:dev', function(){
    return gulp.src('./src/fonts/*.ttf',{encoding:false})
        .pipe(changed('./build/fonts/',{
            extension: 'woff2',
			hasChanged: changed.compareLastModifiedTime 
        }))
        .pipe(ttf2woff2())
        .pipe(gulp.dest('./build/fonts/'));
});

gulp.task('JS:dev', function(){
    return gulp.src('./src/js/*.js')
        .pipe(changed('./build/js'))
        .pipe(plumber(plumberConfig('JS')))
        .pipe(babel())
        .pipe(webpack(require('./../webpack.config.js')))
        .pipe(gulp.dest('./build/js'));    
})

gulp.task('php:dev', function(){
    return gulp.src('./src/php/**/*')
        .pipe(changed('./build/php/'))
        .pipe(gulp.dest('./build/php/'));
});

const settingServer = {
    livereload: true,
    open: true
};

gulp.task('serverPhp:dev', function() {
    php.server({
     port: 8000,
     base: './build',
     keepalive: true,
     open: true,
    });
});

gulp.task('server:dev', function(){
    return gulp.src('./build/').pipe(server(settingServer))   
});

gulp.task('watch:dev', function(){
    gulp.watch('./src/html/**/*.html', gulp.parallel('html:dev'));
    gulp.watch('./src/scss/**/*.scss', gulp.parallel('sass:dev'));
    gulp.watch('./src/js/**/*.js', gulp.parallel('JS:dev'));
    gulp.watch('./src/php/**/*', gulp.parallel('php:dev'));
    gulp.watch('./src/img/**/*', gulp.parallel('images:dev'));
    gulp.watch('./src/fonts/**/*', gulp.parallel('fonts:dev'));
});



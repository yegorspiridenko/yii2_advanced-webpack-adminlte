const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcssPresetEnv = require('postcss-preset-env');
const postcssHasPseudo = require('css-has-pseudo');

module.exports = {
    plugins: [
        autoprefixer,
        cssnano({
            preset: [
                'default', {
                    discardComments: {
                        removeAll: true,
                    },
                },
            ],
        }),
        postcssPresetEnv({
            stage: 2,
            browsers: 'last 2 versions',
        }),
        postcssHasPseudo,
    ],
};

const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');

module.exports = {
    entry: {
        app: path.resolve(__dirname, 'frontend/assets/src/index.ts'),
    },
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'frontend/assets/build'),
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js', '.json', '.jsx', '.css', '.mjs'],
    },
    stats: {
        warnings: true,
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx|ts|tsx)$/,
                exclude: /(node_modules)/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env'],
                        },
                    },
                    {
                        loader: 'ts-loader',
                        options: {
                            compilerOptions: {
                                noEmit: false,
                            },
                        },
                    },
                ],
            },
            {
                test: /\.(s[ac]|c)ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            sourceMap: true,
                            postcssOptions: { path: 'postcss.config.js' },
                        },
                    },
                    'sass-loader',
                ],
            },
            {
                test: /\.(jpg|png|svg|gif)$/,
                type: 'asset/resource',
                generator: {
                    filename: 'img/[name][ext][query]',
                },
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][ext][query]',
                },
            },
        ],
    },
    plugins: [
        new ESLintPlugin({
            extensions: ['js', 'jsx', 'ts', 'tsx'],
            context: path.resolve(__dirname, 'frontend/assets/src'),
            formatter: require.resolve('react-dev-utils/eslintFormatter'),
        }),
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
        new StylelintPlugin({
            configFile: path.resolve(__dirname, '.stylelintrc.js'),
            context: path.resolve(__dirname, 'frontend/assets/src/style/'),
            files: [path.resolve(__dirname, '**/*.{css,scss,sass}')],
            failOnError: false,
        }),
        new CopyWebpackPlugin({
            patterns: [{ from: './frontend/assets/src/img', to: '../build/img' }],
        }),
    ],
};

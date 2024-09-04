import React from 'react';
import ReactDOM from 'react-dom';

import App from './App';

import './style/main.scss';

import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
    const rootElement = document.getElementById('root');

    if (rootElement) {
        ReactDOM.render(React.createElement(App), rootElement);
    }
});

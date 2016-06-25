import angular from 'angular';

import Layout from './component/layout/layout.component';
import Toolbar from './component/toolbar/toolbar.component';
import NetflixLogin from './component/netflix-login/netflix-login.component';
import NetflixHome from './component/netflix-home/netflix-home.component';

const moduleName = 'app.components';

angular
    .module(moduleName, [])
    .component('layout', Layout)
    .component('toolbar', Toolbar)
    .component('netflixLogin', NetflixLogin)
    .component('netflixHome', NetflixHome);

export default moduleName;

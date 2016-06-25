import angular from 'angular';

import NetflixLogin from './component/netflix-login/netflix-login.component';
import NetflixHome from './component/netflix-home/netflix-home.component';

const moduleName = 'app.components';

angular
    .module(moduleName, [])
    .component('netflixLogin', NetflixLogin)
    .component('netflixHome', NetflixHome);

export default moduleName;

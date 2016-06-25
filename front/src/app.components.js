import angular from 'angular';

import Login from './component/login/login.component';
import Home from './component/home/home.component';

const moduleName = 'app.components';

angular
    .module(moduleName, [])
    .component('login', Login)
    .component('home', Home);

export default moduleName;

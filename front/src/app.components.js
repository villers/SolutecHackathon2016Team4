import angular from 'angular';

import Toolbar from './component/toolbar/toolbar.component';
import Login from './component/login/login.component';
import Register from './component/register/register.component';
import Home from './component/home/home.component';

const moduleName = 'app.components';

angular
    .module(moduleName, [])
    .component('toolbar', Toolbar)
    .component('login', Login)
    .component('register', Register)
    .component('home', Home);

export default moduleName;

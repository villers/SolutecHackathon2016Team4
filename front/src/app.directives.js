import angular from 'angular';

import SampleDirective from './directive/sample.directive';

const moduleName = 'app.directivess';

angular
  .module(moduleName, [])
  .component('sampleDirective', SampleDirective);

export default moduleName;

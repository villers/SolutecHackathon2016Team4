import angular from 'angular';

import SampleDirective from './directive/sample.directive';
import StarDirective from './directive/star.directive';

const moduleName = 'app.directives';

angular
  .module(moduleName, [])
  .component('starDirective', StarDirective)
  .component('sampleDirective', SampleDirective);

export default moduleName;

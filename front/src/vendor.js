import highcharts from 'highcharts/highstock';

/**
 * Pull Highcharts into window and use CommonJS syntax to import themes
 * Highcharts don't support ES6 import for theming
 */
window.Highcharts = highcharts;
require('highcharts/highcharts-more')(highcharts);
require('highcharts/themes/dark-unica');

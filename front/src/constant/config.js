export const ENV = 'PRODUCTION';
export const DEBUG = (ENV !== 'PRODUCTION');
export const API_URL = 'http://192.168.101.3:8000/api';

export default { ENV, DEBUG, API_URL };

/* eslint-disable no-unused-vars */

/**
 * @fileoverview
 * This module adds Axios to the global Window interface and sets default headers.
 */

import axios from "axios";

declare global {
  interface Window {
    axios: typeof axios;
  }
}

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

export {};
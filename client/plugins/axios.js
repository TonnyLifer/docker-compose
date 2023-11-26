import axios from "axios";
export default defineNuxtPlugin((nuxtApp) => {
  const defaultUrl = "http://localhost:8080/api";

  let api = axios.create()
  api.defaults.baseURL = defaultUrl
  
return {
    provide: {
      api: api,
    },
  };
});
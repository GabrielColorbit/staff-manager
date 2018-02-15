import axios from "axios";
import store from "../store";
import config from "./config";

function defaults(config) {
  const { email, password } = store.getters.auth;
  return {
    ...config,
    ...{
      auth: { username: email, password: password }
    }
  };
}

export default url => {
  const service = axios.create(config);
  // url = 'http://www.dotlog.com.br/staff-manager/public/api/employees/';

  return {
    request(config) {
      return service.request(defaults(config));
    },
    get(id = "", config) {
      return service.get(`${url}/${id}`, defaults(config));
    },
    delete(id, config) {
      return service.delete(`${url}/${id}`, defaults(config));
    },
    head(config) {
      return service.head(url, defaults(config));
    },
    options(config) {
      return service.options(url, defaults(config));
    },
    post(data, config) {
      return service.post(url, data, defaults(config));
    },
    put(id, data, config) {
      return service.put(`${url}/${id}`, data, defaults(config));
    },
    patch(id, data, config) {
      return service.patch(`${url}/${id}`, data, defaults(config));
    }
  };
};

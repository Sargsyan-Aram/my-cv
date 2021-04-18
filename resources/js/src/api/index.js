import localization from "./modules/localization";
import auth from "./modules/auth";

const modules = {
    localization,
    auth
}

export default {
    get: name => modules[name]
}

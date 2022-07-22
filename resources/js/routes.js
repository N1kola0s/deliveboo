import Home from "./Pages/Home";
import Restaurant from "./Pages/Restaurant";

const routes = [
    { path: '/', name: 'home', component: Home },
    { path: '/:slug', name: 'restaurant', component: Restaurant }
]


export default routes
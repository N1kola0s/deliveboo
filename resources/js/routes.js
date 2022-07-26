import Home from "./Pages/Home";
import Restaurant from "./Pages/Restaurant";
import Checkout from "./Pages/Checkout";

const routes = [
    { path: '/', name: 'home', component: Home },
    { path: '/:slug', name: 'restaurant', component: Restaurant },
    { path: '/checkout/:slug', name: 'checkout', component: Checkout }

]


export default routes
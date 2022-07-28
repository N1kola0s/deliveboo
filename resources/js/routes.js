import Home from "./Pages/Home";
import Restaurant from "./Pages/Restaurant";
import Checkout from "./Pages/Checkout";
/* Nuovi Import */
import ThankYou from "./Pages/ThankYou";
import NotFound from "./pages/NotFound";


const routes = [
    { path: '/', name: 'home', component: Home },
    { path: '/:slug', name: 'restaurant', component: Restaurant },
    { path: '/checkout/:slug', name: 'checkout', component: Checkout },
    /* Nuovi componenti importati */
    { path: '/checkout/:slug/thankyou', name: 'thankyou', component: ThankYou },
    { path: "*", component: NotFound }
]


export default routes

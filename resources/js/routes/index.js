
import About from "../views/About";
import dashboardComponent from "../views/dashboardComponent";
import categoryComponent from "../views/product/categoryComponent";
import subCategoryComponent from "../views/product/subCategoryComponent";
import CustomersComponent from "../views/Customer/CustomersComponent";
import OrdersComponent from "../views/Customer/OrdersComponent";
import ProductsComponent from "../views/product/ProductsComponent";

const route = [
    {
        path : '/admin/dashboard',
        name : 'home',
        component : dashboardComponent
    },

    // Product
    {
        path : '/admin/about',
        name : 'about',
        component : About
    },
    {
        path : '/admin/product/category',
        name : 'categories',
        component : categoryComponent,
        meta:{pageTitle :'Category', dataUrl : 'api/categories'}
    },
    {
        path : '/admin/product/sub_category',
        name : 'sub_categories',
        component : subCategoryComponent,
        meta:{pageTitle :'Sub-Category', dataUrl : 'api/sub_categories'}
    },
    {
        path : '/admin/product/product',
        name : 'product',
        component : ProductsComponent,
        meta:{pageTitle :'product', dataUrl : 'api/product'}
    },

    // Customer
    {
        path : '/admin/Customer/Customer',
        name : 'customer',
        component : CustomersComponent,
        meta:{pageTitle :'Customer', dataUrl : 'api/customer'}
    },
    {
        path : '/admin/Customer/Orders',
        name : 'orders',
        component : OrdersComponent,
        meta:{pageTitle :'orders', dataUrl : 'api/orders'}
    },
];
export default route;
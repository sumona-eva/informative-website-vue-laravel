import {createRouter, createWebHistory} from 'vue-router'
import authMiddleware from "@/middleware/auth.ts";

const router = createRouter({
    scrollBehavior(to, from, savedPosition) {
        return { top: 0 }
      },
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'Home',
            component: () => import('@/pages/Frontend/Index.vue')
        },
        {
            path: '/services',
            name: 'Front.Services',
            component: () => import('@/pages/Frontend/Services/Index.vue')
        },
        {
            path: '/client',
            name: 'Front.Client',
            component: () => import('@/pages/Frontend/Client/Index.vue')
        },
        {
            path: '/contact',
            name: 'Contact',
            component: () => import('@/pages/Frontend/Contact/Index.vue')
        },
        {
            path: '/career',
            name: 'Career',
            component: () => import('@/pages/Frontend/Career/Index.vue')
        },
        {
            path: '/media',
            name: 'NewsMedia',
            component: () => import('@/pages/Frontend/NewsMedia/Index.vue')
        },
        // {
        //     path:'/blog',
        //     name:'Blog',
        //     component: () => import('@/pages/Frontend/Blog.vue')
        // },
        // {
        //     path:'/blog-detail/:slug',
        //     name:'BlogDetail',
        //     component: () => import('@/pages/Frontend/BlogDetail.vue')
        // },
        // {
        //     path: '/portfolio',
        //     name: 'Portfolio',
        //     component: () => import('@/pages/Frontend/Portfolio.vue')
        // },
        // {
        //     path: '/portfolio/:slug',
        //     name: 'PortfolioDetail',
        //     component: () => import('@/pages/Frontend/PortfolioDetail.vue')
        // },
        // {
        //     path: '/contact',
        //     name: 'Contact',
        //     component: () => import('@/pages/Frontend/Contact.vue')
        // },
        // {
        //     path: '/about',
        //     name: 'About',
        //     component: () => import('@/pages/Frontend/About.vue')
        // },
        //
        // {
        //     path:'/team',
        //     name:'OurTeam',
        //     component: () => import('@/pages/Frontend/Team.vue')
        // },
        // {
        //     path:'/royal-service',
        //     name:'Package',
        //     component: () => import('@/pages/Frontend/Package.vue')
        // },
        // {
        //     path:'/royal-service/:slug',
        //     name:'PackageDetail',
        //     component: () => import('@/pages/Frontend/PackageDetail.vue')
        // },
        // {
        //     path:'/trending',
        //     name:'Trending',
        //     component: () => import('@/pages/Frontend/Trending.vue')
        // },
        // {
        //     path:'/terms-and-copyright',
        //     name:'TermsConditions',
        //     component: () => import('@/pages/Frontend/TermsConditions.vue')
        // },
        // {
        //     path:'/privacy-policy',
        //     name:'PrivacyPolicy',
        //     component: () => import('@/pages/Frontend/PrivacyPolicy.vue')
        // },
        // {
        //     path: '/admin',
        //     name: 'Admin',
        //     children: [
        //
        //         {
        //             path: '/admin/login',
        //             name: 'Login',
        //             component: () => import('@/pages/Dashboard/Auth/Login.vue')
        //         },
        //         {
        //             path: '/admin/dashboard',
        //             name: 'Dashboard',
        //             component: () => import('@/pages/Dashboard/Index.vue')
        //         },
        //         {
        //           path: '/admin/slider',
        //           name: 'HeroSlider',
        //           component: () => import('@/pages/Dashboard/Cms/HeroSlider.vue')
        //         },
		// 		{
		// 		 path:'/admin/review',
		// 		 name:'AdminReview',
		// 		 component: () => import('@/pages/Dashboard/Review/Index.vue')
		// 		},
        //         {
        //             path: '/admin/services',
        //             name: 'DashboardServices',
        //             component: () => import('@/pages/Dashboard/Service/Index.vue')
        //         },
        //         {
        //             path: '/admin/create-service',
        //             name: 'CreateServices',
        //             component: () => import('@/pages/Dashboard/Service/Create.vue')
        //         },
        //         {
        //             path: '/admin/edit-service/:id',
        //             name: 'EditServices',
        //             component: () => import('@/pages/Dashboard/Service/Edit.vue')
        //         },
        //         {
        //             path: '/admin/request',
        //             name: 'ServiceRequest',
        //             component: () => import('@/pages/Dashboard/Service/Request.vue')
        //         },
        //         {
        //             path: '/admin/project-category',
        //             name: 'ProjectCategory',
        //             component: () => import('@/pages/Dashboard/Projects/Category.vue')
        //         },
        //         {
        //             path: '/admin/projects',
        //             name: 'AllProjects',
        //             component: () => import('@/pages/Dashboard/Projects/Index.vue')
        //         },
        //         {
        //             path: '/admin/create-project',
        //             name: 'CreateProject',
        //             component: () => import('@/pages/Dashboard/Projects/Create.vue')
        //         },
        //         {
        //             path: '/admin/edit-project/:id',
        //             name: 'EditProjects',
        //             component: () => import('@/pages/Dashboard/Projects/Edit.vue')
        //         },
        //         {
        //             path:'/admin/team-member',
        //             name:'TeamMember',
        //             component: () => import('@/pages/Dashboard/Team/Index.vue')
        //         },
        //         {
        //             path:'/admin/manage-content',
        //             name:'ManageContent',
        //             component: () => import('@/pages/Dashboard/Cms/ContentManage.vue')
        //         },
        //         {
        //             path:'/admin/blog',
        //             name:'DashboardBlog',
        //             component: () => import('@/pages/Dashboard/Cms/Blog/Index.vue')
        //         },
        //         {
        //             path:'/admin/create-blog',
        //             name:'CreateBlog',
        //             component: () => import('@/pages/Dashboard/Cms/Blog/Create.vue')
        //         },
        //         {
        //             path:'/admin/edit-blog/:id',
        //             name:'EditBlog',
        //             component: () => import('@/pages/Dashboard/Cms/Blog/Edit.vue')
        //         },
        //         {
        //             path:'/admin/package',
        //             name:'AdminPackage',
        //             component: () => import('@/pages/Dashboard/Package/Index.vue')
        //         },
        //         {
        //             path:'/admin/create-package',
        //             name:'CreatePackage',
        //             component: () => import('@/pages/Dashboard/Package/Create.vue')
        //         },
        //         {
        //             path:'/admin/edit-package/:id',
        //             name:'EditPackage',
        //             component: () => import('@/pages/Dashboard/Package/Edit.vue')
        //         },
        //         {
        //             path:'/admin/work-step',
        //             name:'DashboardWorkStep',
        //             component: () => import('@/pages/Dashboard/WorkStep/Index.vue')
        //         },
        //         {
        //             path:'/admin/trending',
        //             name:'DashboardTrending',
        //             component: () => import('@/pages/Dashboard/Trending/Index.vue')
        //         },
        //         {
        //             path:'/admin/terms-of-use-copyright',
        //             name:'DashboardTermsCopyright',
        //             component: () => import('@/pages/Dashboard/Policy/TermsCopyright.vue')
        //         },
        //         {
        //             path:'/admin/privacy-policy',
        //             name:'DashboardPrivacyPolicy'   ,
        //             component: () => import('@/pages/Dashboard/Policy/PrivacyPolicy.vue')
        //         },
        //         {
        //             path:'/admin/setting',
        //             name:'AdminSetting',
        //             component: () => import('@/pages/Dashboard/Setting/Index.vue')
        //         }
        //     ]
        // }
    ]
})

router.beforeEach(authMiddleware)

export default router

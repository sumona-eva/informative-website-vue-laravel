// @ts-ignore
import { useAuthStore } from '@/stores/useAuthStore.js'

export default (to:any, from:any, next:any):void => {
	const auth = useAuthStore()

	let exceptionalRoutes :string[] = ['Login']
	let isGoingExceptionalRoutes :boolean = exceptionalRoutes.includes(to.name)

	let authProtected :string[] = [
        'Dashboard',
        'HeroSlider',
        'DashboardServices',
        'CreateServices',
        'ServiceRequest',
        'ProjectCategory',
        'AllProjects',
        'CreateProject',
        'EditProjects',
    ]
	let isAuthProtected :boolean = authProtected.includes(to.name)
	if (!auth.isLoggedIn && isAuthProtected) {
		next({ name: 'Login' })
	}else if (auth.isLoggedIn && isGoingExceptionalRoutes) {
		next({ name: 'Dashboard', query: { 'redirect-reason': 'already logged' } })
	} else {
		next()
	}
}

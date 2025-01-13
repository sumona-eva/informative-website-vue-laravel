<script setup>
const props = defineProps({
        text:{
            type: Boolean,
            default: true
        }
    });
</script>

<template>
    <div class="mx-auto">
        <div>
            <div class="flex items-center gap-3 p-5">
<!--                <img class="w-32 h-auto" src="@/assets/images/eye-art-logo.png">-->
            </div>
            <p class="pl-5 text-gray-400 mb-3">Pages</p>
            <ul class="flex flex-col gap-5 px-5 ">
                <li>
                    <RouterLink :to="{name:'Dashboard'}" class="flex items-center gap-2">
                        <div>
                            <Icon name="ic:twotone-dashboard-customize" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-primary">Dashboard</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink :to="{name:'DashboardServices'}" class="flex items-center gap-2">
                        <div>
                            <Icon name="material-symbols:service-toolbox-sharp" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-primary">Services</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink :to="{name:'ProjectCategory'}" class="flex items-center gap-2">
                        <div>
                            <Icon   name="carbon:ibm-data-product-exchange" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-primary">Project Category</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink :to="{name:'AllProjects'}" class="flex items-center gap-2">
                        <div>
                            <Icon   name="carbon:ibm-data-product-exchange" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-primary">Projects</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  to="/admin/request" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-primary">Service Request</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  :to="{name:'TeamMember'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-primary">Team Member</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  :to="{name:'AdminPackage'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p   class="text-primary">Package</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  :to="{name:'DashboardTrending'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p   class="text-primary">Trending</p>
                    </RouterLink>
                </li>
				<li>
                    <RouterLink  :to="{name:'AdminReview'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p   class="text-primary">Review</p>
                    </RouterLink>
                </li>
                <li>
                    <p class="text-sm font-normal text-gray-400 mb-3">CMS</p>
                    <ul class="flex flex-col gap-2">
                        <li>
                            <RouterLink :to="{name: 'HeroSlider'}" class="flex items-center gap-2">
                                <div >
                                    <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                                </div>
                                <p class="text-gray-300">Hero Slider</p>
                            </RouterLink>
                        </li>
                        <!-- <li>
                            <RouterLink :to="{name: 'ManageContent'}" class="flex items-center gap-2">
                                <div >
                                    <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                                </div>
                                <p class="text-gray-300">ManageContent</p>
                            </RouterLink>
                        </li> -->
                        <li>
                            <RouterLink :to="{name: 'DashboardBlog'}" class="flex items-center gap-2">
                                <div >
                                    <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                                </div>
                                <p class="text-gray-300">Blog</p>
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{name: 'DashboardWorkStep'}" class="flex items-center gap-2">
                                <div >
                                    <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                                </div>
                                <p class="text-gray-300">Work Step</p>
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{name: 'DashboardTermsCopyright'}" class="flex items-center gap-2">
                                <div >
                                    <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                                </div>
                                <p class="text-gray-300">Terms of use & Copyright</p>
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{name: 'DashboardPrivacyPolicy'}" class="flex items-center gap-2">
                                <div >
                                    <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                                </div>
                                <p class="text-gray-300">Privacy policy</p>
                            </RouterLink>
                        </li>
                    </ul>
                </li>
                <li>
                    <p class="text-sm font-normal text-gray-400 mb-3">App</p>
                    <RouterLink  :to="{name: 'AdminSetting'}" class="flex items-center gap-2">
                        <div>
                            <Icon name="material-symbols:settings-outline-rounded" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-gray-300">Settings</p>
                    </RouterLink>
                </li>
            </ul>
        </div>
    </div>
</template>

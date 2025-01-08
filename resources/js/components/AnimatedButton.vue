<template>
    <RouterLink>
        <div class="menu align-center expanded text-center SMN_effect-28">
            <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
                <rect id="shape" height="40" width="150" />
                <div id="text">
                    <a href=""><span class="spot"></span>Lets Talk</a>
                </div>
            </svg>
        </div>
    </RouterLink>
</template>
<style scoped>

/*
---------------------------------------
hover effect 28
---------------------------------------
*/
a:hover, a:focus {
	outline: none;
}

.menu a {
	color: rgba(255, 255, 255, 0.8);
	font-family: Lato;
	font-size: 17pt;
	font-weight: 400;
	padding: 15px 25px;
	/**/
	position: relative;
	display: block;
	text-decoration: none;
	text-transform: uppercase;
}

.SMN_effect-28 a {
	padding: 0;
}

.SMN_effect-28 #text {
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	-webkit-align-items: center;
	-moz-align-items: center;
	-ms-align-items: center;
	-o-align-items: center;
	align-items: center;
	-webkit-justify-content: center;
	-moz-justify-content: center;
	-ms-justify-content: center;
	-o-justify-content: center;
	justify-content: center;
	position: absolute;
	top: 0;
	bottom: 0;
	margin: auto;
}

.SMN_effect-28 #shape {
	stroke-width: 3px;
	fill: transparent;
	stroke: rgba(255, 255, 255, 0.3);
	stroke-dasharray: 85 400;
	stroke-dashoffset: -220;
	transition: 1s all ease;
}

.SMN_effect-28 li:hover #shape {
	stroke-dasharray: 50 0;
	stroke-width: 3px;
	stroke-dashoffset: 0;
	stroke: rgba(255, 255, 255, 1);
}
</style>
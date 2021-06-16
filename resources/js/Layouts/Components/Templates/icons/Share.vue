<template>
    <svg
        :class="state"
        fill="#000000"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
    >
        <path
            d="M 18 2 A 3 3 0 0 0 15 5 A 3 3 0 0 0 15.054688 5.5605469 L 7.9394531 9.7109375 A 3 3 0 0 0 6 9 A 3 3 0 0 0 3 12 A 3 3 0 0 0 6 15 A 3 3 0 0 0 7.9355469 14.287109 L 15.054688 18.439453 A 3 3 0 0 0 15 19 A 3 3 0 0 0 18 22 A 3 3 0 0 0 21 19 A 3 3 0 0 0 18 16 A 3 3 0 0 0 16.0625 16.712891 L 8.9453125 12.560547 A 3 3 0 0 0 9 12 A 3 3 0 0 0 8.9453125 11.439453 L 16.060547 7.2890625 A 3 3 0 0 0 18 8 A 3 3 0 0 0 21 5 A 3 3 0 0 0 18 2 z"
        />
    </svg>
</template>

<script>
export default {
    methods:{

    },
    updated(){
        
    },
    props:{
        state: String,
    }
};
</script>

<style lang="scss" scoped>
@include SVGHold($white, $yellow);

@keyframes show {
    0%{transform: rotate(0deg);}
    100%{transform: rotate(360deg);}
}
@keyframes hide {
    0%{transform: rotate(0deg);}
    100%{transform: rotate(-360deg);}
}

.none{

}
.hide{
    animation: hide 500ms ease-in-out 0ms 1 normal both;
}
.show{
    animation: show 300ms ease-in-out 0ms 1 normal both;
}

</style>

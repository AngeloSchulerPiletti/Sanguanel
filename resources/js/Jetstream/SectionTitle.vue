<template>
    <div>
        <div>
            <h3>
                <slot name="title"></slot>
            </h3>

            <p>
                <slot name="description"></slot>
            </p>
        </div>

        <div>
            <slot name="aside"></slot>
        </div>
    </div>
</template>

<style lang="scss" scoped>
h3{
    @include Fonte1_S;
    font-size: 2vw;
}
p{
    @include Fonte2_SS;
    font-size: 1.3vw;
}
</style>

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
h3 {
    @include Fonte1_S;
    font-size: 2vw;
}
p {
    @include Fonte2_SS;
    font-size: 1.3vw;
}

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
    h3 {
        font-size: 3.2vw;
    }
    p {
        font-size: 1.8vw;
        text-align: justify;
    }
}
</style>

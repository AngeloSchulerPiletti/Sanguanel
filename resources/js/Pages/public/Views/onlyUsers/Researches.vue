<template>
    <!-- CABEÇALHO DA PÁGINA -->
    <inertia-head>
        <title>Sanguanel | Pesquisas</title>
        <meta
            name="description"
            content="Pesquisas sobre hidromel onde o usuário logado pode participar"
        />
    </inertia-head>
    <!-- CABEÇALHO DA PÁGINA -->

    <app-public :header_content="header">
        <article>
            <p class="simple_p">
                Muito obrigado pela sua participação. Essa pesquisa é uma forma
                de mantermos uma base de dados sólida sobre os consumidores do
                mercado de hidromel no Brasil e, dessa forma, disponibilizar
                dados estatísticos
                <em
                    >(isto é, seu nome ou quaisquer informações sensíveis não
                    aparecem)</em
                >
                para qualquer pessoa ou entidade de forma gratuita.
            </p>
            <p class="simple_p">
                Você está logado como
                <strong>{{ $page.props.user.name }}</strong
                >. A resposta será salva em sua conta.
            </p>
        </article>

        <section id="research">
            <form @submit.prevent="submit">
                <div class="container">
                    <label for="">Qual o seu estado?</label>
                    <select v-model="form.state">
                        <option
                            v-for="(name, uf) in statesCodes"
                            :key="uf"
                            :value="uf"
                        >
                            {{ name }}
                        </option>
                    </select>
                </div>

                <div class="container">
                    <p>Quais as suas marcas de hidromel favoritas?</p>

                    <ul>
                        <li
                            class="checkbox_item"
                            v-for="(value, brand) in brands"
                            :key="value"
                        >
                            <input
                                type="checkbox"
                                :id="value"
                                v-model="form.brands[value]"
                            />
                            <label :for="value">{{ brand }}</label>
                        </li>
                    </ul>
                </div>

                <div class="container">
                    <label for="other">Outra marca?</label>
                    <input type="text" id="other" v-model="form.other" />
                </div>

                <div class="container">
                    <label for="xp"
                        >Há quantos anos que conheces o hidromel?</label
                    >
                    <select id="xp" v-model="form.xp">
                        <option value="-1">Menos de 1 ano</option>
                        <option value="1">Mais de 1 ano</option>
                        <option value="2">Mais de 2 anos</option>
                        <option value="5">Mais de 5 anos</option>
                        <option value="10">Mais de 10 anos</option>
                    </select>
                </div>

                <div id="actions">
                    <button>Participar</button>
                </div>
            </form>
        </section>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    data() {
        return {
            header: {
                title: ["Obrigado por participar!", "Pesquisas"],
                style: "SubHomePages",
            },
            form: this.$inertia.form({
                state: null,
                brands: {
                    //
                },
                other: null,
                xp: null,
            }),
            statesCodes: {
                RO: "Rondônia",
                AC: "Acre",
                AM: "Amazonas",
                RR: "Roraima",
                AP: "Amapá",
                TO: "Tocantins",
                MT: "Mato Grosso",
                GO: "Goiás",
                MS: "Mato Grosso do Sul",
                MG: "Minas Gerais",
                PR: "Paraná",
                RS: "Rio Grande do Sul",
                BH: "Bahia",
                PI: "Piauí",
                CE: "Ceará",
                RN: "Rio Grande do Norte",
                AL: "Alagoas",
                SE: "Sergipe",
                DF: "Distrito Federal",
                PE: "Pernambuco",
                MA: "Maranhão",
                PA: "Pará",
                SP: "São Paulo",
                RJ: "Rio de Janeiro",
                ES: "Espírito Santo",
                SC: "Santa Catarina",
                PB: "Paraíba",
            },
            brands: {
                Arven: "arven",
                "Daemon Brew": "daemon_brew",
                "Etéreo Hidroméis": "etero",
                Ferroada: "ferroada",
                Kheiron: "kheiron",
                "Prince Honey": "prince_honey",
                Valkiria: "valkiria",
                YggDrasill: "yggdrasill",
                "Örun Mead": "orun_mead",
                Langskip: "langskip",
                "Lobos Hidroméis": "lobos",
                Norseman: "norseman",
                "Old Pony": "old_pony",
                "Philip Mead": "philip_mead",
                Oakenshield: "oakenshield",
                Sleipnir: "sleipnir",
                Meltz: "meltz",
                Meadwine: "meadwine",
            },
        };
    },
    methods: {
        submit: function () {
            this.form.post(this.route("researches.send"));
        },
    },
    created() {
        var brandsVal = Object.values(this.brands);
        brandsVal.forEach((el) => {
            this.form.brands[el] = false;
        });
    },
    components: {
        AppPublic,
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin";

article {
    @include ArticleStyle();
}

#research {
    padding: 3vw;

    form {
        display: flex;
        flex-direction: column;
        gap: 3vw;
    }
    .container {
        display: flex;
        flex-direction: column;

        label,
        p {
            @include Fonte1_SS;
            font-size: 1.5vw;
        }
        input,
        select {
            @include Fonte2_SS;
            font-size: 1.3vw;

            &:focus,
            &:target {
                border: 1px solid $yellow;
                box-shadow: 0 0 0 0;
                outline: none;
            }
        }
        [type="checkbox"] {
            width: 1.5vw;
            height: 1.5vw;
            &:checked {
                background-color: $yellow;
            }
        }
        .checkbox_item {
            display: flex;
            align-items: center;
            gap: 1vw;
        }
    }
    #actions {
        button {
            @include button1;
        }
    }
}
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Live & Upcomming</div>

                    <div class="card-body">
                        <!-- Live matches -->
                        <div v-if="liveMatches.length > 0" class="row" style="padding: 10px; margin-bottom: 40px" v-for="liveMatch in liveMatches">
                            <div class="col-md-2">
                                <span style="margin-left: -25px; background-color: #f47320; color: #FFF; border-radius: 10px; padding: 3px;">Live</span>
                                <span style="text-transform: uppercase">{{ liveMatch.subtitle }}</span><br>
                                <small style="color:#f47320">{{ liveMatch.venue.name }}</small><br>
                                <span style="color:#f47320">{{ moment(liveMatch.date_start).format('LT') }} Local Time</span>
                                </div>
                            <div class="col-md-3">
                                <h4 style="color: #31404b; text-transform: uppercase">{{ liveMatch.teama.name }}</h4><br>
                                <h5>{{ liveMatch.teama.scores_full }}</h5>
                            </div>
                            <div class="col-md-3 text-center">
                                <img style="height:40px" :src="liveMatch.teama.logo_url">
                                <span style="color:#f47320; font-size: 30px; padding: 0 20px;">VS</span>
                                <img style="height:40px" :src="liveMatch.teamb.logo_url">
                            </div>
                            <div class="col-md-3">
                                <h4 style="color: #31404b; text-transform: uppercase">{{ liveMatch.teamb.name }}</h4><br>
                                <h5>{{ liveMatch.teamb.scores_full }}</h5>
                            </div>
                            <div style="color:#f47320;" class="col-md-1">
                               <h5 style="margin: 0 -30px 0 -10px;">{{ moment(liveMatch.date_start).format('DD MMM, YY') }}</h5>
                            </div>
                        </div>

                        <!-- Upcomming matches -->
                        <div v-if="upcommingMatches.length > 0" class="row" style="padding: 10px; margin-bottom: 40px" v-for="upcommingMatche in upcommingMatches">
                            <div class="col-md-2">
                                <span style="margin-left: -25px; background-color: #006442; color: #FFF; border-radius: 10px; padding: 3px;">Upcomming</span>
                                <span style="text-transform: uppercase">{{ upcommingMatche.subtitle }}</span><br>
                                <small style="color:#006442">{{ upcommingMatche.venue.name }}</small><br>
                                <span style="color:#006442">{{ moment(upcommingMatche.date_start).format('LT') }} Local Time</span>
                                </div>
                            <div class="col-md-3">
                                <h4 style="color: #31404b">{{ upcommingMatche.teama.name }}</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <img style="height:40px" :src="upcommingMatche.teama.logo_url">
                                <span style="color:#006442; font-size: 30px; padding: 0 20px;">VS</span>
                                <img style="height:40px" :src="upcommingMatche.teamb.logo_url">
                            </div>
                            <div class="col-md-3">
                                <h4 style="color: #31404b">{{ upcommingMatche.teamb.name }}</h4>
                            </div>
                            <div style="color:#006442;" class="col-md-1">
                               <h5 style="margin: 0 -30px 0 -10px;">{{ moment(upcommingMatche.date_start).format('DD MMM, YY') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                liveMatches: {},
                upcommingMatches: {},
            }
        },

        methods: {
            setTweet: function() {
                var self = this;
                setInterval(function() {
                    axios.get('/live-match')
                        .then((response)=>{
                        self.liveMatches = response.data
                        console.log(response.data);
                        })
                }, 15000);
            },
            getLiveMatch(){
                axios.get('/live-match')
                     .then((response)=>{
                       this.liveMatches = response.data
                     })
            },
            getUpcommingMatch(){
                axios.get('/upcomming-match')
                     .then((response)=>{
                       this.upcommingMatches = response.data
                     })
            }
        },

        created() {
           this.getLiveMatch();
           this.getUpcommingMatch();
        },

        mounted() {
            this.setTweet(); 
        }
    }
</script> 


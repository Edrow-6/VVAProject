{{-- SCRIPT EN DEV DU TRI EN FONCTION DE LA OU ON CLIQUE --}}
<script>
    console.log('%c DARK ZONE!', 'font-weight: bold; font-size: 50px;color: cyan; text-shadow: 3px 3px 0 rgb(4,77,145) , 6px 6px 0 rgb(42,21,113)'); 
    console.log('%c ~ Vous n\'avez rien à faire ici. Avez-vous besoin d\'aide ? http://perdu.com', 'color: gray;font-weight: bold;font-size: 25px;');

    function sidebar() {
        const breakpoint = 1280;

        return {
            open: {
                above: true,
                below: false,
            },
            isAboveBreakpoint: window.innerWidth > breakpoint,

            handleResize() {
                this.isAboveBreakpoint = window.innerWidth > breakpoint;
            },

            isOpen() {
                console.log(this.isAboveBreakpoint);
                if (this.isAboveBreakpoint) {
                    return this.open.above;
                }
                return this.open.below;
            },
            handleOpen() {
                if (this.isAboveBreakpoint) {
                    this.open.above = true;
                }
                this.open.below = true;
            },
            handleClose() {
                if (this.isAboveBreakpoint) {
                    this.open.above = false;
                }
                this.open.below = false;
            },
            handleAway() {
                if (!this.isAboveBreakpoint) {
                    this.open.below = false;
                }
            },
        };
    };
</script>
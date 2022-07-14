<style>
    .overlay
    {
        height: 100%;
        width: 100%;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        background-color: rgba(0,0,0, 0.1);
        overflow-x: hidden
    }
    .overlay-content
    {
        position: relative;
        top: 30%; /* 25% from the top */
        width: 100%; /* 100% width */
        text-align: center; /* Centered text/links */
        margin-top: 30px;
    }

    .overlay-content img
    {
        width: 40px;

    }

</style>

<div class="overlay" id="loading" style="display: none">
    <div class="overlay-content">
        <img src="{{asset('dashboard/loading.gif')}}">
    </div>
</div>

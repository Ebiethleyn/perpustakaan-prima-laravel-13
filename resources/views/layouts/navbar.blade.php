<nav
    style="background-color: #2d2d2d; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #ff2d20;">
    <div style="display: flex; align-items: center; gap: 12px;">
        <img src="https://smk.prestasiprima.sch.id/assets/images/logo-smk.png" alt="Logo SMK Prestasi Prima"
            style="height: 40px; width: auto;">
        <span style="color: white; font-weight: bold; font-size: 18px; font-family: Arial, sans-serif;">
            Perpus Prestasi Prima
        </span>
    </div>

    <div style="display: flex; align-items: center; gap: 15px; font-family: Arial, sans-serif;">
        <div style="color: #bbb; font-size: 14px; text-align: right;">
            <strong style="color: white; display: block;">{{ Auth::user()->namaLengkap }}</strong>
            <span style="font-size: 12px; text-transform: uppercase; color: #ff2d20;">{{ Auth::user()->role }}</span>
        </div>

        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit"
                style="background-color: #ff2d20; color: white; border: none; padding: 8px 15px; border-radius: 4px; font-weight: bold; cursor: pointer; transition: 0.2s;">
                Logout
            </button>
        </form>
    </div>
</nav>

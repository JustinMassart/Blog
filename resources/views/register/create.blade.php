<x-layout>

    <x-slot name="mainContent">

        <sectiosn class="px-6 py-8">

            <form action="/register" method="POST">

                <div>


                    <label for="email">Email</label>

                    <input class="border" type="email" id="email" name="email" value="">

                </div>

                <div>

                    <label for="name">Name</label>

                    <input class="border" type="text" id="name" name="name" value="">


                </div>

                <div>

                    <label for="username">Username</label>

                    <input class="border" type="text" id="username" name="username" value="">


                </div>

                <div>

                    <label for="password">Password</label>

                    <input class="border" type="password" id="password" name="password" value="">


                </div>

                <input type="submit" value="Register">


            </form>


        </sectiosn>

    </x-slot>

</x-layout>

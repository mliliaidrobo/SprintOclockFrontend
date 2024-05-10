import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PrincipalComponent } from './estructura/principal.component';
import { DashboardComponent } from './modulos/dashboard/dashboard.component';
import { SprintComponent } from './modulos/sprint/sprint.component';
import { TareasComponent } from './modulos/tareas/tareas.component';
import { TeamComponent } from './modulos/team/team.component';
import { ProyectosComponent } from './modulos/proyectos/proyectos.component';

const routes: Routes = [
  {
    path: '', component:PrincipalComponent, 
    children:
    [
      {path: 'dashboard', component: DashboardComponent}, 
      {path: 'proyectos', component: ProyectosComponent}, 
      {path: 'sprint', component: SprintComponent}, 
      {path: 'tareas', component: TareasComponent},
      {path: 'team', component: TeamComponent},
      {path: '', redirectTo: 'dashboard',pathMatch: 'full' }
    ]
}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { Component } from '@angular/core';
import { ProyectoService } from 'src/app/servicios/proyecto.service';

@Component({
  selector: 'app-proyectos',
  templateUrl: './proyectos.component.html',
  styleUrls: ['./proyectos.component.scss']
})
export class ProyectosComponent {

  proyecto:any;
  
  constructor (private sproyect: ProyectoService){}

  ngOnInit():void{

  }

  consultar(){
    this.sproyect.consultar().subscribe((resultado:any)=>{
      this.proyecto = resultado;
    })
    
    }
  }



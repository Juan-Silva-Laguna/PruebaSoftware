import { Component, OnInit } from '@angular/core';
import { TerceroService } from '../tercero.service';
import { Tercero } from '../tercero';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {  
  terceros: Tercero[] = [];

  // constructor() { }
  constructor(public terceroService: TerceroService) { }

  ngOnInit(): void {
    this.terceroService.getAll().subscribe((data: Tercero[])=>{
      this.terceros = data;
      console.log(this.terceros);
    })
  }

  deleteTercero(id){
    this.terceroService.delete(id).subscribe(res => {
         this.terceros = this.terceros.filter(item => item.id !== id);
         console.log('tercero deleted successfully!');
    })
  }

}
